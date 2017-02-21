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


Route::group(['middleware' => ['web']], function () {
    
    //Authentication Route
    Route::get('login', ['as'=>'login', 'uses'=>'Auth\LoginController@showLoginForm']);
    Route::post('login', 'Auth\LoginController@login');


    Route::get('logout', ['as'=>'logout','uses'=>'Auth\LoginController@logout']);


    Route::get('register', ['as'=>'register','uses'=>'Auth\RegisterController@showRegistrationForm']);
    Route::post('register', 'Auth\RegisterController@register');

    Route::get('home', ['as'=>'home','usue'=>'HomeController@index']);

    Route::get('blog/{slug}',['as'=>'blog.single','uses'=>'BlogController@getSingle'])->where('slug','[\w\d\-\_]+');

    Route::get('/', 'PageController@getIndex');
    Route::get('blog','BlogController@getIndex');
    Route::get('about','AboutController@index');
    Route::post('about',['as'=>'about.post','uses'=>'AboutController@postAbout']);


    Route::resource('posts','PostController');

    Route::resource('categories','CategoryController',['except'=>['create']]);

    Route::resource('tags','TagController');

    Route::resource('comments','CommentController',['except'=>['create']]);

    Route::post('comments/{post_id}',['uses'=>'CommentController@store','as'=>'comments.store']);
    Route::get('comments/{id}/edit', ['as' => 'comments.edit', 'uses' => 'CommentController@edit']);
    Route::put('comments/{id}', ['as' => 'comments.update', 'uses' => 'CommentController@update']);
    Route::delete('comments/{id}', ['as' => 'comments.destroy', 'uses' => 'CommentController@destroy']);
    Route::get('comments/{id}/delete', ['as' => 'comments.delete', 'uses' => 'CommentController@delete']);


});

Route::resource('admin/thaibinh', 'Admin\thaibinhController');

