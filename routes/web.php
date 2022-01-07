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

Route::get('get_popular_products', 'ProductController@getPopularProducts');
Route::get('/product/product_details/{id}', 'ProductController@getProductDetails');
Route::get('search', 'ProductController@search');
Route::post('search-filter', 'ProductController@searchFilter');

Route::group(['prefix' => 'user', 'middleware' => ['auth']], function()
{
    Route::get('profile', 'UserController@index');
    Route::post('check_password', 'UserController@checkPassword');
    Route::post('update', 'UserController@update');

    Route::post('add_to_cart', 'CartController@addToCart');
    Route::get('get_cart/{id}', 'CartController@getCart');
    Route::delete('cart', 'CartController@removeFromCart');

    Route::post('checkout', 'CartController@checkout');
    Route::get('order/{id}', 'OrderController@getOrderHistory');
});

Route::group(['prefix' => 'product', 'middleware' => ['auth','CheckSeller']], function ()
{
    Route::get('addProduct', 'ProductController@getAddProductView');
    Route::post('add_product', 'ProductController@addProduct');
    Route::get('user_products', 'ProductController@getUserProductsView');
    Route::get('get_user_products', 'ProductController@getAllUserProducts');
    Route::get('get_product/{id}', 'ProductController@getProduct');
});

require __DIR__.'/auth.php';