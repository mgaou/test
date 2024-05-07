<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
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

Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false,
  ]);

Route::get('/', function () {
    return view('welcome');
});


Route::group(['middleware' => 'auth'], function() {
  Route::get('/home', [HomeController::class, 'index'])->name('home');
  Route::get('/category.index',[CategoryController::class,'index'])->name('category');
  Route::resource('category', CategoryController::class);
  Route::resource('product', ProductController::class);
  Route::get('/product.index',[ProductController::class,'index'])->name('product');
});

