<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // role add route
    Route::get('/add-role',[RoleController::class,'create'])->name('add.role');
    Route::post('/add-role',[RoleController::class,'store'])->name('store.role');
    Route::get('/delete-role/{id}',[RoleController::class,'delete'])->name('delete.role');
    // permission add
    Route::get('/add-permission/{id}',[RoleController::class,'create_permission'])->name('create.permission');
    Route::post('/add-permission/store',[RoleController::class,'store_permission'])->name('store.permission');
    Route::get('/add-permission/delete/{id}',[RoleController::class,'delete_permission'])->name('delete.permission');
    // role and permission assign
    Route::get('/assign-role-permission',[RoleController::class,'assign_role_permission'])->name('assign.role.permission');
    Route::post('/assign-role-permission/post',[RoleController::class,'assign_role_permission_store'])->name('assign.role.permission.store');

});

/*
|================================================
|               Admin Route Start
|================================================
*/

Route::get('/add-user', [AdminController::class, 'add_user'])->name('add.user');
Route::post('/add-user/post', [AdminController::class, 'add_user_store'])->name('add.user.store');

/*
|================================================
|               Admin Route End
|================================================
*/


require __DIR__.'/auth.php';
Route::get('/', [CustomerController::class, 'index'])->name('/home');

Route::get('/customer/login', [CustomerController::class, 'login_field'])->name('login.field');
Route::post('/customer/login', [CustomerController::class, 'login'])->name('customer.login');
Route::resource('/customer', CustomerController::class);
// Route::get('/register', [CustomerController::class, 'register'])->name('regestration');
