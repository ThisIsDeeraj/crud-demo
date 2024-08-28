<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\DashboardController;
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


Route::get('dashboard',[DashboardController::class,'index'])->name('user-dashboard');



Route::get('blog-create',[BlogController::class,'create'])->name('blog.create');
Route::post('blog-store',[BlogController::class,'store'])->name('blog.store');
Route::get('blog-list',[BlogController::class,'index'])->name('blog.index');
Route::get('blog-edit/{id}',[BlogController::class,'edit'])->name('blog.edit');
Route::put('blog-update/{id}',[BlogController::class,'update'])->name('blog.update');
Route::delete('blog-delete/{id}',[BlogController::class,'delete'])->name('blog.delete');