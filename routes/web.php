<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\IncomeController;
use App\Http\controllers\IncomecetegoryController;
use App\Http\Controllers\ExpenceController;
use App\Http\Controllers\ExpensecetegoryController;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('dashboard', [AdminController::class, 'index']);


Route::get('dashboard/user', [UserController::class, 'index']);
Route::get('dashboard/user/add', [UserController::class, 'add']);
Route::get('dashboard/user/edit', [UserController::class, 'edit']);
Route::get('dashboard/user/view', [UserController::class, 'view']);
Route::post('dashboard/user/submite', [UserController::class, 'insert']);
Route::post('dashboard/user/update', [UserController::class, 'update']);
Route::post('dashboard/user/softdelete', [UserController::class, 'softdelete']);
Route::post('dashboard/user/restore', [UserController::class, 'restore']);
Route::post('dashboard/user/delete', [UserController::class, 'delete']); 


Route::get('dashboard/Income', [IncomeController::class, 'index']);
Route::get('dashboard/Income/add', [IncomeController::class, 'add']);
Route::get('dashboard/Income/edit', [IncomeController::class, 'edit']);
Route::get('dashboard/Income/view', [IncomeController::class, 'view']);
Route::post('dashboard/Income/submite', [IncomeController::class, 'insert']);
Route::post('dashboard/Income/update', [IncomeController::class, 'update']);
Route::post('dashboard/Income/softdelete', [IncomeController::class, 'softdelete']);
Route::post('dashboard/Income/restore', [IncomeController::class, 'restore']);
Route::post('dashboard/Income/delete', [IncomeController::class, 'delete']);

Route::get('dashboard/Income/cetegory', [IncomecetegoryController::class, 'index']);
Route::get('dashboard/Income/cetegory/add', [IncomecetegoryController::class, 'add']);
Route::get('dashboard/Income/cetegory/edit/{slug}', [IncomecetegoryController::class, 'edit']);
Route::get('dashboard/Income/cetegory/view/{slug}', [IncomecetegoryController::class, 'view']);
Route::post('dashboard/Income/cetegory/submit', [IncomecetegoryController::class, 'insert']);
Route::post('dashboard/Income/cetegory/update', [IncomecetegoryController::class, 'update']);
Route::get('dashboard/Income/cetegory/softdelete/{id}', [IncomecetegoryController::class, 'softdelete']);
Route::post('dashboard/Income/cetegory/restore', [IncomecetegoryController::class, 'restore']);
Route::post('dashboard/Income/cetegory/delete', [IncomecetegoryController::class, 'delete']);

Route::get('dashboard/expense', [ExpenseControlleroller::class, 'index']);
Route::get('dashboard/expense/add', [ExpenseController::class, 'add']);
Route::get('dashboard/expense/edit', [ExpenseController::class, 'edit']);
Route::get('dashboard/expense/view', [ExpenseController::class, 'view']);
Route::post('dashboard/expense/submite', [ExpenseController::class, 'insert']);
Route::post('dashboard/expense/update', [ExpenseController::class, 'update']);
Route::post('dashboard/expense/softdelete', [ExpenseController::class, 'softdelete']);
Route::post('dashboard/expense/restore', [ExpenseController::class, 'restore']);
Route::post('dashboard/expense/delete', [ExpenseController::class, 'delete']);

Route::get('dashboard/expense/cetegory', [ExpensecetegoryControlleroller::class, 'index']);
Route::get('dashboard/expense/cetegory/add', [ExpensecetegoryController::class, 'add']);
Route::get('dashboard/expense/cetegory/edit', [ExpensecetegoryController::class, 'edit']);
Route::get('dashboard/expense/cetegory/view', [ExpensecetegoryController::class, 'view']);
Route::post('dashboard/expense/cetegory/submite', [ExpensecetegoryController::class, 'insert']);
Route::post('dashboard/expense/cetegory/update', [ExpensecetegoryController::class, 'update']);
Route::post('dashboard/expense/cetegory/softdelete', [ExpensecetegoryController::class, 'softdelete']);
Route::post('dashboard/expense/cetegory/restore', [ExpensecetegoryController::class, 'restore']);
Route::post('dashboard/expense/cetegory/delete', [ExpensecetegoryController::class, 'delete']);



require __DIR__.'/auth.php';
