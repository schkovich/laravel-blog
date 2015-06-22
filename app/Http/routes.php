<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', 'HomeController@index');
Route::get('home', 'HomeController@index');

Route::pattern('id', '[0-9]+');
Route::get('blogs/{id}', 'BlogsController@show');
//Route::get('photo/{id}', 'PhotoController@show');

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

Route::group(['prefix' => 'admin', 'middleware' => 'auth', 'namespace' => 'Admin'], function() {
    Route::pattern('id', '[0-9]+');
    Route::pattern('id2', '[0-9]+');
    # Admin Dashboard
    Route::get('dashboard', 'DashboardController@index');
    # Language
    # Blogs
    Route::get('blogs', 'BlogsController@index');
    Route::get('blogs/create', 'BlogsController@getCreate');
    Route::post('blogs/store', 'BlogsController@postCreate');
    Route::get('blogs/{id}/edit', 'BlogsController@getEdit');
    Route::post('blogs/{id}/edit', 'BlogsController@postEdit');
    Route::get('blogs/{id}/delete', 'BlogsController@getDelete');
    Route::post('blogs/{id}/delete', 'BlogsController@postDelete');
    Route::get('blogs/data', 'BlogsController@data');
    Route::get('blogs/reorder', 'BlogsController@getReorder');
    # Album
    # Photo
    Route::get('photo', 'PhotoController@index');
    Route::get('photo/edit', 'PhotoController@getCreate');
    Route::post('photo/create', 'PhotoController@postCreate');
    Route::get('photo/{id}/edit', 'PhotoController@getEdit');
    Route::post('photo/{id}/edit', 'PhotoController@postEdit');
    Route::get('photo/{id}/delete', 'PhotoController@getDelete');
    Route::post('photo/{id}/delete', 'PhotoController@postDelete');
    Route::get('photo/{id}/itemsforalbum', 'PhotoController@itemsForAlbum');
    Route::get('photo/{id}/{id2}/slider', 'PhotoController@getSlider');
    Route::get('photo/{id}/{id2}/albumcover', 'PhotoController@getAlbumCover');
    Route::get('photo/data/{id}', 'PhotoController@data');
    Route::get('photo/reorder', 'PhotoController@getReorder');
    # Users
});
