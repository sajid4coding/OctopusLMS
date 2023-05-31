<?php

use App\Http\Controllers\CustomerController;
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

Route::get('/', [CustomerController::class, 'index'])->name('/home');

Route::get('/customer/login', [CustomerController::class, 'login_field'])->name('login.field');
Route::post('/customer/login', [CustomerController::class, 'login'])->name('customer.login');
Route::resource('/customer', CustomerController::class);
// Route::get('/register', [CustomerController::class, 'register'])->name('regestration');
