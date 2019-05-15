<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/**
 * Category
 */
Route::resource('categories', 'Category\CategoryController');

/**
 * Brand
 */
Route::resource('brands', 'Brand\BrandController');
