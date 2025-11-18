<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BudgetController;

// Home page
Route::get('/', [PageController::class, 'index'])->name('home');

// Auth routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/signup', [AuthController::class, 'showSignup'])->name('signup');
Route::post('/signup', [AuthController::class, 'signup']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/logout', [AuthController::class, 'logout']);

// Budget routes (protected)
Route::middleware('auth')->group(function () {
    Route::get('/budget', [BudgetController::class, 'index'])->name('budget.index');
    Route::post('/budget/update', [BudgetController::class, 'update'])->name('budget.update');
    Route::post('/budget/state', [BudgetController::class, 'saveState'])->name('budget.state');
    Route::get('/budget/chart-data', [BudgetController::class, 'getChartData'])->name('budget.chart-data');
});
