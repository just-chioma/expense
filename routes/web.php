<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [AuthController::class, 'create'])->name('user.create');
Route::post('/register', [AuthController::class, 'storeUser'])->name('user.store');
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.store');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');
    Route::get('/users', [UserController::class, 'show'])->name('user.show');
    Route::put('/user/{id}', [UserController::class, 'update'])->name('user.update');
    Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::post('/user/logout', [AuthController::class, 'logout'])->name('user.logout');
  
//expense
    Route::get('/expenses/create', [ExpenseController::class, 'create'])->name('expenses.create');
    Route::post('/expenses', [ExpenseController::class, 'storeExpenses'])->name('expenses.store');
    Route::get('/expenses', [ExpenseController::class, 'index'])->name('expenses.index');
    Route::delete('/expenses/{id}', [ExpenseController::class, 'destroy'])->name('expenses.destroy');
    Route::put('/expenses/{id}', [ExpenseController::class, 'update'])->name('expenses.update');
    Route::get('/expenses/{id}/edit', [ExpenseController::class, 'edit'])->name('expenses.edit');

   
});
Route::middleware('auth', 'admin') ->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/users', [AdminController::class, 'index'])->name('users.index');
    Route::get('/users/{id}/profile', [AdminController::class, 'userProfile'])->name('users.profile');
    Route::get('/expenses', [AdminController::class, 'expenseIndex'])->name('expenses.index');
    Route::get('/users/{id}/edit', [AdminController::class, 'userEdit'])->name('users.edit');
    Route::put('/users/{id}', [AdminController::class, 'userUpdate'])->name('users.update');
    Route::get('/users/create', [AdminController::class, 'createUser'])->name('users.create');
    Route::post('/users', [AdminController::class, 'adminStoreUser'])->name('users.store');
    Route::delete('/users/{id}', [AdminController::class, 'destroy'])->name('users.delete');
    Route::get('/expenses/create', [AdminController::class, 'createExpenses'])->name('expenses.create');
    Route::post('/expenses', [AdminController::class, 'storeExpenses'])->name('expenses.store');
    Route::get('/expenses/{id}/edit', [AdminController::class, 'editExpenses'])->name('expenses.edit');
    Route::put('/expenses/{id}', [AdminController::class, 'updateExpenses'])->name('expenses.update');
    Route::delete('/expense/{id}', [AdminController::class, 'destroyExpense'])->name('expenses.destroy');
    Route::post('/logout', [AdminController::class, 'logout'])->name('logout');

});
Route::middleware('auth') ->prefix('profile')->name('profile.')->group(function (){
    Route::get('/show', [ProfileController::class, 'show'])->name('show');
    Route::get('/edit', [ProfileController::class, 'edit'])->name('edit');
    Route::put('/update', [ProfileController::class, 'update'])->name('update');
});