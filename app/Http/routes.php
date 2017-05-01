<?php
/**
 * 前台路由
 */
Route::get('/category', 'Home\HomeController@getCategory');
Route::get('/article/{article}', 'Home\HomeController@show');
Route::get('/pages/{slug}', 'Home\HomeController@pages');
Route::get('/search', 'Home\HomeController@search');
Route::get('/tag/{tag}', 'Home\HomeController@tag');
Route::get('/links','Home\HomeController@links');

/**
 * 后台路由
 */
Route::get('/', 'Home\HomeController@index');
Route::get('/admin', 'Admin\AdminController@index');
Route::post('/admin/login', 'Admin\AdminController@login');

Route::group(['middleware' => ['auth'], 'prefix' => 'admin'], function() {
    Route::get('/logout', 'Admin\AdminController@logout');
    Route::get('/skin', 'Admin\AdminController@skin@skin');
    Route::get('/dashboard', 'Admin\AdminController@dashboard');
    Route::post('post/upload', 'Admin\UploadController@imgUpload');

    Route::get('/articles/recycle', 'Admin\ArticleController@recycle');
    Route::get('/articles/restore/{id}', 'Admin\ArticleController@restore');
    Route::get('/articles/delete/{id}', 'Admin\ArticleController@delete');
    Route::resource('/articles', 'Admin\ArticleController');

    Route::resource('/pages','Admin\PagesController');

    Route::get('/category', 'Admin\CategoryController@index');
    Route::post('/category', 'Admin\CategoryController@store');
    Route::post('/category/edit/{id}', 'Admin\CategoryController@edit');
    Route::patch('/category/update/{id}', 'Admin\CategoryController@update');
    Route::delete('/category/delete/{id}', 'Admin\CategoryController@destroy');

    Route::get('/tags', 'Admin\TagController@index');
    Route::post('/tags', 'Admin\TagController@create');
    Route::post('/tags/edit/{id}', 'Admin\TagController@edit');
    Route::patch('/tags/update/{id}', 'Admin\TagController@update');
    Route::delete('/tags/delete/{id}', 'Admin\TagController@destroy');

    Route::get('/links', 'Admin\LinksController@links');
    Route::post('/links', 'Admin\LinksController@create');
    Route::get('/links/edit/{id}', 'Admin\LinksController@edit');
    Route::patch('/links/update/{id}', 'Admin\LinksController@update');
    Route::delete('/links/delete/{id}', 'Admin\LinksController@destroy');

    Route::get('/options/basic', 'Admin\OptionsController@basic');
    Route::patch('/options/basic/{id}', 'Admin\OptionsController@update');
    Route::post('/options/basic', 'Admin\OptionsController@create');

    Route::get('/user/add', 'Admin\OptionsController@addUser');
    Route::get('/user/edit','Admin\OptionsController@editUser');
    Route::patch('/user/update/{id}','Admin\OptionsController@updateUser');
});

Route::get('/{category}', 'Home\HomeController@category');