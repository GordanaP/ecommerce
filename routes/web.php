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
Route::resource('categories.products', 'Category\CategoryProductController', [
    'only' => ['index', 'create', 'store']
]);

/**
 * Brand
 */
Route::resource('brands', 'Brand\BrandController');
Route::resource('brands.products', 'Brand\BrandProductController', [
    'only' => ['index', 'create', 'store']
]);


/**
 * Product
 */
Route::resource('products', 'Product\ProductController');
