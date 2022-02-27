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
Route::get('/user', 'UserController@index');
Route::get('/redirect', 'UserController@redirect');

Route::post('/user/update/{id}', 'UserController@update');

Route::get('/', 'ArticleController@index');
Route::get('/articles/{id}/detail', 'ArticleController@show');

//Category Routes
Route::get('/categories', 'CategoryController@index');

Route::group(['middleware' => 'auth'], function () {
    // Article Routes
    Route::get('/articles/create', 'ArticleController@create');
    Route::post('/articles/create', 'ArticleController@store');

    Route::get('/articles/{id}', 'ArticleController@edit');
    Route::put('/articles/{id}', 'ArticleController@update');

    Route::get('/articles/{id}/delete', 'ArticleController@destroy');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
