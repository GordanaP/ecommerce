<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/**
 * Payment
 */
Route::get('payments/create', 'Payment\PaymentController@create')
    ->name('payments.create');

/**
 * Cart
 */
Route::prefix('customer-cart')->group(function() {
    Route::delete('/', 'Cart\CartController@empty')->name('carts.empty');
    Route::get('/create', 'Cart\CartController@create')->name('carts.create');
    Route::get('/show', 'Cart\CartController@show')->name('carts.show');
    Route::post('/{product}', 'Cart\CartController@store')->name('carts.store');
    Route::patch('/{rowId}', 'Cart\CartController@update')->name('carts.update');
    Route::delete('/{rowId}', 'Cart\CartController@destroy')->name('carts.destroy');
});

// CartCustomer
Route::post('/carts/customers/store', 'Cart\CartCustomerController@store')->name('carts.customers.store');

/**
 * Order
 */
Route::resource('orders', 'Order\OrderController', [
    'except' => ['edit', 'update']
]);

/* OrderProduct */
Route::resource('orders.products', 'Order\OrderProductController', [
    'only' => ['index', 'create', 'store']
]);

/**
 * Customer
 */
Route::resource('customers', 'Customer\CustomerController');

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
