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


Route::get('/', function () {
    return view('homepage');
})->name('homepage');

Route::get('popular_products', 'ProductController@getPopularProducts');
Route::get('similar_products', 'ProductController@getSimilarProducts');
Route::get('product/{id}', 'ProductController@getProductDetails');
Route::get('search', 'ProductController@search');
Route::post('search', 'ProductController@searchFilter');

Route::group(['prefix' => 'user', 'middleware' => ['auth']], function()
{
    Route::get('profile', 'UserController@index');
    Route::post('password', 'UserController@checkPassword');
    Route::put('profile', 'UserController@update');

    Route::post('cart', 'CartController@addToCart');
    Route::get('cart', 'CartController@getCart');
    Route::delete('cart', 'CartController@removeFromCart');

    Route::post('order', 'CartController@checkout');
    Route::get('order', 'OrderController@getOrderHistory');
});

Route::group(['prefix' => 'seller', 'middleware' => ['auth','CheckSeller']], function ()
{
    Route::get('product', 'ProductController@getAddProductView');
    Route::post('product', 'ProductController@addProduct');
    Route::get('/', 'ProductController@getUserProductsView');
    Route::get('product/{id}', 'ProductController@getProduct');
});

require __DIR__.'/auth.php';