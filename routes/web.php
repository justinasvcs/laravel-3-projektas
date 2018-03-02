<?php

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

Route::get('/justinas', function() {
    echo 'labas, Justinai';
});

Route::get('/posts', 'PostsController@index');

Route::get('/posts/{id}', 'PostsController@single')
     ->where('id', '[0-9]+');

Route::get('/posts/create', 'PostsController@create');

Route::post('/posts', 'PostsController@store');

Route::get('/posts/edit/{id}', 'PostsController@edit')
     ->where('id', '[0-9]+');

Route::put('/posts/{id}', 'PostsController@update')
     ->where('id', '[0-9]+');

Route::delete('/posts/{id}', 'PostsController@destroy')
     ->where('id', '[0-9]+');





