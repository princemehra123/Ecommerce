<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DplayController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
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

//Route::middleware('auth')->group(function(){
Route::resource('/category',CategoryController::class);

Route::resource('/product',ProductController::class);
Route::get('/deleteimg/{id}',[ProductController::class,'imageDelete']);
Route::resource('/dplay',DplayController::class);
Route::resource('/admin',AdminController::class);
//Route::get('/redirect', [App\Http\Controllers\AdminController::class, 'redirect']);


// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [App\Http\Controllers\HomeController::class, 'display']);
// ->name('home');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/productdetails/{id}', [App\Http\Controllers\HomeController::class, 'productdetails']);
// ->name('home');
//Route::get('/redirect', [App\Http\Controllers\HomeController::class, 'redirect']);

//});

//Cart handel
Route::resource('/cart',CartController::class);

Route::post('/cart/{id}',[CartController::class,'add_cart']);

//Route::get('/show_cart',[CartController::class,'show_cart']);

Auth::routes();
