<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DplayController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
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
//Route::get('/redirect', [App\Http\Controllers\AdminController::class, 'redirect']);


// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [App\Http\Controllers\HomeController::class, 'display']);
// ->name('home');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);

Route::get('/productdetails/{id}', [App\Http\Controllers\HomeController::class, 'productdetails']);

Route::get('/product_search',[App\Http\Controllers\HomeController::class, 'product_search']);
// ->name('home');
//Route::get('/redirect', [App\Http\Controllers\HomeController::class, 'redirect']);

//});

//Cart handel
Route::resource('/cart',CartController::class);

Route::post('/cart/{id}',[CartController::class,'add_cart']);

//Route::get('/show_cart',[CartController::class,'show_cart']);


//orders handle
Route::resource('/order', OrderController::class);

Route::get('/cash_order',[OrderController::class ,'cash_orders']);

Route::get('/cash_order_one/{id}',[OrderController::class ,'cash_orders_one']);

Route::get('/stripe/{totalprice}',[OrderController::class,'stripe']);//for card payment

Route::post('stripe/{totalprice}',[OrderController::class,'stripepost'])->name('stripe.post');

Route::get('/showorders',[OrderController::class ,'showorder']);

Route::get('/cancelorder/{id}',[OrderController::class,'cancelorder']);


//Admin order handle
Route::resource('/admin',AdminController::class);

Route::get('/order',[AdminController::class ,'orderShow']);

Route::get('/delivered/{id}',[AdminController::class ,'delivered']);//change in delivery and payment status

Route::get('/print_pdf/{id}',[AdminController::class,'print_pdf']);//download pdf

Route::get('/search',[AdminController::class,'SearchProductInAdminPanel']);//for search in admin panel

Route::get('/dashboard',[AdminController::class,'dashboard']);

Auth::routes();
