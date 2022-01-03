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

Route::group(['prefix' => 'user', 'middleware' => ['auth']], function(){
    Route::get('profile', 'UserController@index');
    Route::post('check_password', 'UserController@checkPassword');
    Route::post('update', 'UserController@update');
    Route::get('addProduct', 'ProductController@getAddProductView');
});

require __DIR__.'/auth.php';