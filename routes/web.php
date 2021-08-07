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

Route::get('/import', 'UserController@importData');
Route::get('/companylist/{minage}/{maxage}', 'UserController@getData');
Route::get('/posts/edit/{id}', 'UserController@editPosts');
Route::get('/posts/save', 'UserController@savePosts');
