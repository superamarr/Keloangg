<?php

namespace Database\Seeders;

use App\Models\BudgetState;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DummyUsageSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::updateOrCreate(
            ['email' => 'dara@keloang.test'],
            [
                'name' => 'Dara Budgeteer',
                'password' => Hash::make('Password123!'),
            ]
        );

        $defaultBudgets = [
            ['category' => 'Kebutuhan Pokok', 'percentage' => 50, 'color' => '#014AAD'],
            ['category' => 'Tabungan', 'percentage' => 20, 'color' => '#10B981'],
            ['category' => 'Investasi', 'percentage' => 15, 'color' => '#8B5CF6'],
            ['category' => 'Hiburan', 'percentage' => 10, 'color' => '#F59E0B'],
            ['category' => 'Lainnya', 'percentage' => 5, 'color' => '#6B7280'],
        ];

        $monthlyIncome = 12_000_000;
        $baseDate = Carbon::now()->startOfMonth()->subMonths(11);

        $categoryTemplates = [
            ['category' => 'Kebutuhan Pokok', 'description' => 'Belanja kebutuhan rumah tangga', 'base' => 380_000],
            ['category' => 'Tabungan', 'description' => 'Setoran tabungan bulanan', 'base' => 150_000],
            ['category' => 'Investasi', 'description' => 'Top-up reksadana', 'base' => 180_000],
            ['category' => 'Hiburan', 'description' => 'Hangout akhir pekan', 'base' => 120_000],
            ['category' => 'Lainnya', 'description' => 'Keperluan tidak terduga', 'base' => 70_000],
        ];

        $expenses = [];
        $extraBudgetHistory = [];
        $expenseId = 1;

        for ($i = 0; $i < 12; $i++) {
            $month = (clone $baseDate)->addMonths($i);

            foreach ($categoryTemplates as $index => $template) {
                $date = (clone $month)->addDays(3 + ($index * 5));
                $amountVariation = rand(-25_000, 40_000);

                $expenses[] = [
                    'id' => $expenseId++,
                    'date' => $date->toDateString(),
                    'category' => $template['category'],
                    'description' => $template['description'],
                    'amount' => max(80_000, $template['base'] + $amountVariation),
                ];
            }

            $extraAmount = 150_000 + (($i % 3) * 25_000);
            $extraDate = (clone $month)->addDays(2);

            $extraBudgetHistory[] = [
                'id' => $extraDate->timestamp,
                'amount' => $extraAmount,
                'date' => $extraDate->toDateString(),
                'timestamp' => $extraDate->toIso8601String(),
            ];
        }

        $totalExpenses = array_sum(array_map(fn ($expense) => $expense['amount'], $expenses));
        $lastExtra = $extraBudgetHistory[count($extraBudgetHistory) - 1] ?? ['amount' => 0];
        $extraBudget = $lastExtra['amount'];
        $remainingBudget = max(($monthlyIncome + $extraBudget) - $totalExpenses, 0);

        BudgetState::updateOrCreate(
            ['user_id' => $user->id],
            [
                'current_month' => Carbon::now()->format('Y-m'),
                'monthly_income' => $monthlyIncome,
                'extra_budget' => $extraBudget,
                'remaining_budget' => $remainingBudget,
                'budgets' => $defaultBudgets,
                'expenses' => $expenses,
                'extra_budget_history' => $extraBudgetHistory,
            ]
        );
    }
}


