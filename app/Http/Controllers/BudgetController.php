<?php

namespace App\Http\Controllers;

use App\Models\BudgetState;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class BudgetController extends Controller
{
    public function index()
    {
        // Default budget percentages with professional color scheme
        $defaultBudgets = [
            ['category' => 'Kebutuhan Pokok', 'percentage' => 50, 'color' => '#014AAD'],
            ['category' => 'Tabungan', 'percentage' => 20, 'color' => '#10B981'],
            ['category' => 'Investasi', 'percentage' => 15, 'color' => '#8B5CF6'],
            ['category' => 'Hiburan', 'percentage' => 10, 'color' => '#F59E0B'],
            ['category' => 'Lainnya', 'percentage' => 5, 'color' => '#6B7280'],
        ];

        $user = Auth::user();
        $currentMonth = now()->format('Y-m'); // Format: '2025-01'

        $state = BudgetState::firstOrCreate(
            ['user_id' => $user->id],
            [
                'current_month' => $currentMonth,
                'monthly_income' => 0,
                'extra_budget' => 0,
                'remaining_budget' => 0,
                'budgets' => $defaultBudgets,
                'expenses' => [],
            ]
        );

        // Check if it's a new month - reset if needed
        $isNewMonth = false;
        if ($state->current_month !== $currentMonth) {
            // Reset monthly data but keep budget percentages
            $state->update([
                'current_month' => $currentMonth,
                'monthly_income' => 0,
                'extra_budget' => 0,
                'remaining_budget' => 0,
                'expenses' => [],
                'extra_budget_history' => [],
                // budgets tetap tidak diubah
            ]);
            
            // Reload state after reset
            $state->refresh();
            $isNewMonth = true;
        }

        $budgetState = [
            'monthly_income' => $state->monthly_income,
            'extra_budget' => $state->extra_budget,
            'remaining_budget' => $state->remaining_budget,
            'budgets' => $state->budgets ?? $defaultBudgets,
            'expenses' => $state->expenses ?? [],
            'extra_budget_history' => $state->extra_budget_history ?? [],
            'is_new_month' => $isNewMonth || ($state->monthly_income == 0 && $state->current_month == $currentMonth),
        ];

        return view('budget.index', compact('defaultBudgets', 'budgetState'));
    }

    public function update(Request $request)
    {
        // Handle budget update if needed in the future
        return response()->json(['message' => 'Budget updated successfully']);
    }

    public function saveState(Request $request)
    {
        try {
            $data = $request->validate([
                'monthly_income' => 'required|numeric|min:0',
                'extra_budget' => 'nullable|numeric|min:0',
                'remaining_budget' => 'required|numeric|min:0',
                'budgets' => 'nullable|array',
                'expenses' => 'nullable|array',
                'extra_budget_history' => 'nullable|array',
            ]);

            // Get existing state or use defaults
            $existingState = BudgetState::where('user_id', Auth::id())->first();
            
            // Default budgets if not provided
            $defaultBudgets = [
                ['category' => 'Kebutuhan Pokok', 'percentage' => 50, 'color' => '#014AAD'],
                ['category' => 'Tabungan', 'percentage' => 20, 'color' => '#10B981'],
                ['category' => 'Investasi', 'percentage' => 15, 'color' => '#8B5CF6'],
                ['category' => 'Hiburan', 'percentage' => 10, 'color' => '#F59E0B'],
                ['category' => 'Lainnya', 'percentage' => 5, 'color' => '#6B7280'],
            ];

            BudgetState::updateOrCreate(
                ['user_id' => Auth::id()],
                [
                    'current_month' => now()->format('Y-m'),
                    'monthly_income' => $data['monthly_income'],
                    'extra_budget' => $data['extra_budget'] ?? ($existingState ? $existingState->extra_budget : 0),
                    'remaining_budget' => $data['remaining_budget'],
                    'budgets' => $data['budgets'] ?? ($existingState ? $existingState->budgets : $defaultBudgets),
                    'expenses' => $data['expenses'] ?? ($existingState ? $existingState->expenses : []),
                    'extra_budget_history' => $data['extra_budget_history'] ?? ($existingState ? $existingState->extra_budget_history : []),
                ]
            );

            return response()->json([
                'success' => true,
                'message' => 'Budget state saved successfully'
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            Log::error('Budget state save error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to save budget state: ' . $e->getMessage()
            ], 500);
        }
    }

    public function getChartData(Request $request)
    {
        try {
            $filter = $request->input('filter', 'month');
            $user = Auth::user();
            
            $state = BudgetState::where('user_id', $user->id)->first();
            
            if (!$state) {
                return response()->json([
                    'success' => true,
                    'labels' => [],
                    'incomeData' => [],
                    'expenseData' => []
                ]);
            }

            $monthlyIncome = $state->monthly_income ?? 0;
            $expenses = $state->expenses ?? [];
            
            $now = now();
            $labels = [];
            $incomeData = [];
            $expenseData = [];

            if ($filter === 'day') {
                // Last 7 days
                for ($i = 6; $i >= 0; $i--) {
                    $date = $now->copy()->subDays($i);
                    $dateStr = $date->format('Y-m-d');
                    $labels[] = $date->locale('id')->translatedFormat('d M');
                    
                    // Daily income (portion of monthly income)
                    $daysInMonth = $now->daysInMonth;
                    $dayIncome = $date->isToday() || $date->isFuture() ? ($monthlyIncome / $daysInMonth) : 0;
                    $incomeData[] = round($dayIncome, 2);
                    
                    // Daily expenses
                    $dayExpense = collect($expenses)
                        ->filter(function($exp) use ($dateStr) {
                            return isset($exp['date']) && $exp['date'] === $dateStr;
                        })
                        ->sum('amount');
                    $expenseData[] = round($dayExpense, 2);
                }
            } elseif ($filter === 'week') {
                // Last 8 weeks
                for ($i = 7; $i >= 0; $i--) {
                    $weekStart = $now->copy()->subWeeks($i)->startOfWeek();
                    $weekEnd = $weekStart->copy()->endOfWeek();
                    $labels[] = $weekStart->locale('id')->translatedFormat('d M');
                    
                    // Weekly income
                    if ($weekStart->lte($now) && $weekEnd->gte($now)) {
                        $daysInPeriod = $weekStart->diffInDays($weekEnd) + 1;
                        $daysInMonth = $now->daysInMonth;
                        $weekIncome = ($monthlyIncome / $daysInMonth) * $daysInPeriod;
                    } else {
                        $weekIncome = 0;
                    }
                    $incomeData[] = round($weekIncome, 2);
                    
                    // Weekly expenses
                    $weekExpense = collect($expenses)
                        ->filter(function($exp) use ($weekStart, $weekEnd) {
                            if (!isset($exp['date'])) return false;
                            $expDate = \Carbon\Carbon::parse($exp['date']);
                            return $expDate->gte($weekStart) && $expDate->lte($weekEnd);
                        })
                        ->sum('amount');
                    $expenseData[] = round($weekExpense, 2);
                }
            } elseif ($filter === 'month') {
                // Last 6 months
                for ($i = 5; $i >= 0; $i--) {
                    $month = $now->copy()->subMonths($i)->startOfMonth();
                    $labels[] = $month->locale('id')->translatedFormat('M Y');
                    
                    // Monthly income
                    $monthIncome = ($month->month === $now->month && $month->year === $now->year) ? $monthlyIncome : 0;
                    $incomeData[] = round($monthIncome, 2);
                    
                    // Monthly expenses
                    $monthExpense = collect($expenses)
                        ->filter(function($exp) use ($month) {
                            if (!isset($exp['date'])) return false;
                            $expDate = \Carbon\Carbon::parse($exp['date']);
                            return $expDate->month === $month->month && $expDate->year === $month->year;
                        })
                        ->sum('amount');
                    $expenseData[] = round($monthExpense, 2);
                }
            } elseif ($filter === 'year') {
                // Last 5 years
                for ($i = 4; $i >= 0; $i--) {
                    $year = $now->year - $i;
                    $labels[] = (string)$year;
                    
                    // Yearly income
                    $yearIncome = ($year === $now->year) ? ($monthlyIncome * 12) : 0;
                    $incomeData[] = round($yearIncome, 2);
                    
                    // Yearly expenses
                    $yearExpense = collect($expenses)
                        ->filter(function($exp) use ($year) {
                            if (!isset($exp['date'])) return false;
                            $expDate = \Carbon\Carbon::parse($exp['date']);
                            return $expDate->year === $year;
                        })
                        ->sum('amount');
                    $expenseData[] = round($yearExpense, 2);
                }
            } elseif ($filter === 'all') {
                // All time - group by month
                if (empty($expenses)) {
                    $currentMonth = $now->copy()->startOfMonth();
                    $labels[] = $currentMonth->locale('id')->translatedFormat('M Y');
                    $incomeData[] = round($monthlyIncome, 2);
                    $expenseData[] = 0;
                } else {
                    // Find first expense date
                    $firstExpenseDate = collect($expenses)
                        ->map(function($exp) {
                            return isset($exp['date']) ? \Carbon\Carbon::parse($exp['date']) : null;
                        })
                        ->filter()
                        ->min();
                    
                    if ($firstExpenseDate) {
                        $startMonth = $firstExpenseDate->copy()->startOfMonth();
                        $endMonth = $now->copy()->startOfMonth();
                        
                        $current = $startMonth->copy();
                        while ($current->lte($endMonth)) {
                            $labels[] = $current->locale('id')->translatedFormat('M Y');
                            
                            // Monthly income
                            $monthIncome = ($current->month === $now->month && $current->year === $now->year) ? $monthlyIncome : 0;
                            $incomeData[] = round($monthIncome, 2);
                            
                            // Monthly expenses
                            $monthExpense = collect($expenses)
                                ->filter(function($exp) use ($current) {
                                    if (!isset($exp['date'])) return false;
                                    $expDate = \Carbon\Carbon::parse($exp['date']);
                                    return $expDate->month === $current->month && $expDate->year === $current->year;
                                })
                                ->sum('amount');
                            $expenseData[] = round($monthExpense, 2);
                            
                            $current->addMonth();
                        }
                    }
                }
            }

            return response()->json([
                'success' => true,
                'labels' => $labels,
                'incomeData' => $incomeData,
                'expenseData' => $expenseData
            ]);
        } catch (\Exception $e) {
            Log::error('Chart data error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to get chart data: ' . $e->getMessage()
            ], 500);
        }
    }
}

