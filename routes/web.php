<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/', function () {
    return view('welcome');
});

Route::Auth();

Route::get('/home', 'HomeController@index');

Route::get('/admin', function () {
    return view('admin.index');
});

Route::group(['middleware' =>'admin'], function(){
   
    Route::resource('admin/users', 'AdminUsersController', ['as' => 'admin']);
    
    Route::resource('admin/posts', 'AdminPostsController', ['as' => 'admin']);
    
    Route::resource('admin/categories', 'AdminCategoriesController', ['as' => 'admin']);
});
