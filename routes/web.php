<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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
    return view('dashboard');
});


Route::resource('category', App\Http\Controllers\product\CategoryController::class);

Route::resource('product', App\Http\Controllers\product\ProductController::class);
Route::resource('subproduct', App\Http\Controllers\product\SubproductController::class);


Route::get('/browse', [App\Http\Controllers\product\SubproductController::class, 'browse'])->name('browse');
Route::get('/details/{id}', [App\Http\Controllers\product\SubproductController::class, 'details'])->name('details');




Route::get('/{page}', [AdminController::class, 'index']);
