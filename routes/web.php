<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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
    return view('welcome');
});

Route::get('/payment/new','App\Http\Controllers\PaymentController@new')->name("new_payment");
Route::get('/payment/{id}','App\Http\Controllers\PaymentController@show')->name("show_payment");
Route::post('/payment/{id}','App\Http\Controllers\PaymentController@update')->name("update_payment");
Route::get('/payments','App\Http\Controllers\PaymentController@list')->name("list_payment");
Route::get('/payment/{id}/delete','App\Http\Controllers\PaymentController@delete')->name("delete_payment");


Route::get('/product/new','App\Http\Controllers\ProductController@new')->name("new_product");
Route::get('/product/{id}','App\Http\Controllers\ProductController@show')->name("show_product");
Route::post('/product/{id}','App\Http\Controllers\ProductController@update')->name("update_product");
Route::get('/product/{id}/delete','App\Http\Controllers\ProductController@delete')->name("delete_product");
Route::get('/products','App\Http\Controllers\ProductController@list')->name("list_product");



/// *agna produtos
Route::get('/buy/{id}/{payment}','App\Http\Controllers\BuyController@show')->name("buy");
