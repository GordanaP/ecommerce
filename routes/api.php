<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::name('api.')->group(function () {

    /**
     * Category
     */
    Route::delete('categories/{category?}', 'Api\Category\CategoryController@destroy')
        ->name('categories.destroy');
    Route::apiResource('categories', 'Api\Category\CategoryController', [
        'only' => ['index']
    ]);

    /**
     * CategoryProduct
     */
    Route::apiResource('categories.products', 'Api\Category\CategoryProductController', [
        'only' => ['index']
    ]);

    /**
     * Brand
     */
    Route::delete('brands/{brand?}', 'Api\Brand\BrandController@destroy')
        ->name('brands.destroy');
    Route::apiResource('brands', 'Api\Brand\BrandController', [
        'only' => ['index']
    ]);

    /**
     * CategoryProduct
     */
    Route::apiResource('brands.products', 'Api\Brand\BrandProductController', [
        'only' => ['index']
    ]);

    /**
     * Product
     */
    Route::apiResource('products', 'Api\Product\ProductController', [
        'only' => ['index']
    ]);

    Route::delete('products/{product?}', 'Api\Product\ProductController@destroy')
        ->name('products.destroy');
});
