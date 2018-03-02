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


Route::prefix('posts')->group(function () {
    Route::get('/', 'PostsController@index');

    Route::get('{id}', 'PostsController@single')
         ->where('id', '[0-9]+');

    Route::get('create', 'PostsController@create');

    Route::post('/', 'PostsController@store');

    Route::get('edit/{id}', 'PostsController@edit')
         ->where('id', '[0-9]+');

    Route::put('{id}', 'PostsController@update')
         ->where('id', '[0-9]+');

    Route::delete('{id}', 'PostsController@destroy')
         ->where('id', '[0-9]+');
});

Route::resource('products', 'ProductController');

Route::get('/alkoholis', function() {
    echo 'alkoholio skyrius';
})->middleware('age');





Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
