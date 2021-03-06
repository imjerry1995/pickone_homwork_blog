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

Route::get('/react', function () {
    return view('welcome');
});





//文章頁


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'PostController@index');

// Route::get('/{msg}', 'PostController@indexWithMsg')->name('msg');

Route::resource('post','PostController');
Route::resource('comment','CommentController');

Route::post('comment/{id}','CommentController@store');


//登入註冊路由
// Route::get('login','Auth/AuthController@getLogin');
// Route::post('login','Auth/AuthController@postLogin');
Route::get('logout','Auth\LoginController@logout');

