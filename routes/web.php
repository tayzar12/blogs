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

// Article Routes
Route::get('/', 'ArticleController@index');

Route::get('/articles/create', 'ArticleController@create');
Route::post('/articles/create', 'ArticleController@store');

Route::get('/articles/detail/{id}', 'ArticleController@edit');
Route::put('/articles/detail/{id}', 'ArticleController@update');

Route::get('/articles/{id}/delete', 'ArticleController@destroy');

//Category Routes
Route::get('/categories', 'CategoryController@index');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
