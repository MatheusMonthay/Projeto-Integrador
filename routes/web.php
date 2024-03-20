<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\CreditController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DebitController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {return view('layout');});
Route::match(['get','post'],'/create',[UserController::class, 'index'])->name('create');
Route::match(['get','post'],'/user/create',[UserController::class, 'createUser'])->name('create_user');
Route::match(['get','post'],'/login',[LoginController::class, 'login'])->name('login');
Route::get('/logout',[LoginController::class, 'logout'])->name('logout');

Route::group(['middleware'=>'auth'],function (){
    Route::get('user/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::match(['get','post'],'/dashboard/credit',[CreditController::class, 'index'])->name('credit');
    Route::match(['get','post'],'/dashboard/credit/add',[CreditController::class, 'addCredit'])->name('add_credit');
    Route::match(['get','post'],'/dashboard/debit/add',[DebitController::class, 'addDebit'])->name('add_debit');
    Route::match(['get','post'],'/dashboard/debit',[DebitController::class, 'index'])->name('debit');
    Route::get('/dashboard/destroy/{id}',[DashboardController::class, 'destroy'])->name('destroy');
    Route::get('/dashboard/edit/{id}',[DashboardController::class, 'edit'])->name('edit');
    Route::put('/update/{id}', [DashboardController::class, 'update'])->name('update');

});