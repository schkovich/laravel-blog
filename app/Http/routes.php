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
    Route::get('language', 'LanguageController@index');
    Route::get('language/create', 'LanguageController@getCreate');
    Route::post('language/create', 'LanguageController@postCreate');
    Route::get('language/{id}/edit', 'LanguageController@getEdit');
    Route::post('language/{id}/edit', 'LanguageController@postEdit');
    Route::get('language/{id}/delete', 'LanguageController@getDelete');
    Route::post('language/{id}/delete', 'LanguageController@postDelete');
    Route::get('language/data', 'LanguageController@data');
    Route::get('language/reorder', 'LanguageController@getReorder');
    # Blog category
    Route::get('blogscategory', 'BlogCategoriesController@index');
    Route::get('blogscategory/create', 'BlogCategoriesController@getCreate');
    Route::post('blogscategory/create', 'BlogCategoriesController@postCreate');
    Route::get('blogscategory/{id}/edit', 'BlogCategoriesController@getEdit');
    Route::post('blogscategory/{id}/edit', 'BlogCategoriesController@postEdit');
    Route::get('blogscategory/{id}/delete', 'BlogCategoriesController@getDelete');
    Route::post('blogscategory/{id}/delete', 'BlogCategoriesController@postDelete');
    Route::get('blogscategory/data', 'BlogCategoriesController@data');
    Route::get('blogscategory/reorder', 'BlogCategoriesController@getReorder');
    # Blogs
    Route::get('blogs', 'BlogsController@index');
    Route::get('blogs/create', 'BlogsController@getCreate');
    Route::post('blogs/create', 'BlogsController@postCreate');
    Route::get('blogs/{id}/edit', 'BlogsController@getEdit');
    Route::post('blogs/{id}/edit', 'BlogsController@postEdit');
    Route::get('blogs/{id}/delete', 'BlogsController@getDelete');
    Route::post('blogs/{id}/delete', 'BlogsController@postDelete');
    Route::get('blogs/data', 'BlogsController@data');
    Route::get('blogs/reorder', 'BlogsController@getReorder');
    # Album
    Route::get('album', 'AlbumController@index');
    Route::get('album/create', 'AlbumController@getCreate');
    Route::post('album/create', 'AlbumController@postCreate');
    Route::get('album/{id}/edit', 'AlbumController@getEdit');
    Route::post('album/{id}/edit', 'AlbumController@postEdit');
    Route::get('album/{id}/delete', 'AlbumController@getDelete');
    Route::post('album/{id}/delete', 'AlbumController@postDelete');
    Route::get('album/data', 'AlbumController@data');
    Route::get('album/reorder', 'AlbumController@getReorder');
    # Photo
    Route::get('photo', 'PhotoController@index');
    Route::get('photo/create', 'PhotoController@getCreate');
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
    Route::get('bloggers/', 'BloggerController@index');
    Route::get('bloggers/create', 'BloggerController@getCreate');
    Route::post('bloggers/create', 'BloggerController@postCreate');
    Route::get('bloggers/{id}/edit', 'BloggerController@getEdit');
    Route::post('bloggers/{id}/edit', 'BloggerController@postEdit');
    Route::get('bloggers/{id}/delete', 'BloggerController@getDelete');
    Route::post('bloggers/{id}/delete', 'BloggerController@postDelete');
    Route::get('bloggers/data', 'UserController@data');
});
