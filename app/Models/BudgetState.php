<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BudgetState extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'current_month',
        'monthly_income',
        'extra_budget',
        'remaining_budget',
        'budgets',
        'expenses',
        'extra_budget_history',
    ];

    protected $casts = [
        'budgets' => 'array',
        'expenses' => 'array',
        'extra_budget_history' => 'array',
    ];
}


