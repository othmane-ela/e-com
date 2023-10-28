<?php

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




Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::get('/', 'App\\Http\\Controllers\\ProductController@index')->name('products.index');
Route::get('/produits', 'App\\Http\\Controllers\\ProductController@index')->name('products.index');

Route::get('/produits/{slug}', 'App\\Http\\Controllers\\ProductController@show')->name('products.show');

Route::post('/webhook', 'App\\Http\\Controllers\\WebHookController@index')->name('webhook.index');


Route::get('/contact', 'App\\Http\\Controllers\\ContactSalesController@index')->name('contact.index');


Route::post('/checkout/{productId}', 'App\\Http\\Controllers\\CheckoutController@checkout')->name('checkout');
Route::get('/success', 'App\\Http\\Controllers\\CheckoutController@success')->name('checkout.success');



