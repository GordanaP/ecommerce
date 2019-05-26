<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('customer-cart')->group(function() {
    Route::post('/{product}', 'Cart\CartController@store')->name('carts.store');
    Route::patch('/{rowId}', 'Cart\CartController@update')->name('carts.update');
    Route::delete('/{rowId}', 'Cart\CartController@destroy')->name('carts.destroy');
});

/**
 * Order
 */
Route::resource('orders', 'Order\OrderController');

/* OrderProduct */
Route::resource('orders.products', 'Order\OrderProductController', [
    'only' => ['index', 'create', 'store']
]);

/**
 * Customer
 */
Route::resource('customers', 'Customer\CustomerController');

/*CustomerCart*/
Route::resource('customers.carts', 'Customer\CustomerCartController', [
    'only' => ['create']
]);
Route::get('customers/{customer}/shopping-cart', 'Customer\CustomerCartController@show')
    ->name('customers.carts.show');

/**
 * Category
 */
Route::resource('categories', 'Category\CategoryController');

/* CategoryProduct */
Route::resource('categories.products', 'Category\CategoryProductController', [
    'only' => ['index', 'create', 'store']
]);

/**
 * Brand
 */
Route::resource('brands', 'Brand\BrandController');

/* BrandProduct */
Route::resource('brands.products', 'Brand\BrandProductController', [
    'only' => ['index', 'create', 'store']
]);


/**
 * Product
 */
Route::resource('products', 'Product\ProductController');
