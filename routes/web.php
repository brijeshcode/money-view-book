<?php

use App\Http\Controllers\ExpensesController;
use App\Http\Controllers\CategortiesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::post('expense', [ExpensesController::class, 'store']);
Route::get('expense', [ExpensesController::class, 'index']);
Route::get('expense-total', [ExpensesController::class, 'expenseTotal']);
Route::get('report/monthly-expense', [ExpensesController::class, 'expenseReport']);


// Route::get('expense/categories/create', [CategortiesController::class, 'create']);

Route::get('categories', [CategortiesController::class, 'index']);
Route::get('categories/recent-used', [CategortiesController::class, 'latestUsed']);

Route::get('categories/expenses', [CategortiesController::class, 'expense']);
Route::post('categories', [CategortiesController::class, 'create']);
