<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\DashboardController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware'=>'login_check'],function(){
    Route::get('dashboard',[DashboardController::class,'index'])->name('user-dashboard');



    Route::get('blog-create',[BlogController::class,'create'])->name('blog.create');
    Route::post('blog-store',[BlogController::class,'store'])->name('blog.store');
    Route::get('blog-list',[BlogController::class,'index'])->name('blog.index');
    Route::get('blog-edit/{id}',[BlogController::class,'edit'])->name('blog.edit');
    Route::put('blog-update/{id}',[BlogController::class,'update'])->name('blog.update');
    Route::delete('blog-delete/{id}',[BlogController::class,'delete'])->name('blog.delete');


    
   
    Route::get('users-list',[UserController::class,'index'])->name('users.index');
    Route::get('users-edit/{id}',[UserController::class,'edit'])->name('users.edit');
    Route::put('users-update/{id}',[UserController::class,'update'])->name('users.update');

});



Route::get('login',[AuthController::class,'loginPage'])->name('login-page');
Route::get('register',[AuthController::class,'registerPage'])->name('register-page');
Route::post('register-user',[AuthController::class,'registerUser'])->name('register-user');

Route::get('login-user',[AuthController::class,'loginUser'])->name('login-user');
Route::get('logout',[AuthController::class,'logout'])->name('logout');