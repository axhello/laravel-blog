<?php


Route::get('/', 'Home\HomeController@index');
Route::get('/admin', 'Admin\AdminController@index');
Route::post('/admin/signin', 'Admin\AdminController@signin');
Route::get('/category', 'Home\HomeController@getCategory');
Route::get('/article/{article}', 'Home\HomeController@show');
Route::get('/about', 'Home\AboutController@about');
Route::post('/comment','Home\CommentController@comment');
Route::get('/search', 'Home\HomeController@search');
Route::get('/tag/{tag}', 'Home\TagsController@show');

Route::group(['middleware' => ['auth'], 'prefix' => 'admin'], function() {
    Route::get('/logout', 'Admin\AdminController@logout');
    Route::get('/skin', 'Admin\AdminController@skin@skin');
    Route::get('/dashboard', 'Admin\AdminController@dashboard');
    Route::post('post/upload', 'Admin\UploadController@imgUpload');

    Route::get('/articles/recycle', 'Admin\ArticleController@recycle');
    Route::get('/articles/restore/{id}', 'Admin\ArticleController@restore');
    Route::get('/articles/delete/{id}', 'Admin\ArticleController@delete');
    Route::resource('/articles','Admin\ArticleController');

    Route::get('/category', 'Admin\CategoryController@index');
    Route::patch('/category/{id}', 'Admin\CategoryController@update');
    Route::post('/category', 'Admin\CategoryController@store');
    Route::post('/category/edit/{id}', 'Admin\CategoryController@edit');
    Route::delete('/category/{id}', 'Admin\CategoryController@destroy');

    Route::get('/tags', 'Admin\TagController@index');
    Route::get('/comment', 'Admin\CommentController@index');
    Route::delete('/comment', 'Admin\CommentController@destroy');

    Route::get('/links', 'Admin\LinksController@links');
    Route::post('/links', 'Admin\LinksController@create');
    Route::get('/links/edit/{id}', 'Admin\LinksController@edit');
    Route::patch('/links/update/{id}', 'Admin\LinksController@update');

    Route::get('/options/basic', 'Admin\OptionsController@basic');
    Route::patch('/options/basic/{id}', 'Admin\OptionsController@update');
    Route::post('/options/basic', 'Admin\OptionsController@create');
});

Route::get('/{category}', 'Home\HomeController@category');