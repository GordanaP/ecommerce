<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::name('api.')->group(function () {
    /*
     * Category
     */
    Route::apiResource('categories', 'Api\Category\CategoryController', [
        'only' => ['index']
    ]);

    Route::delete('categories/{category?}', 'Api\Category\CategoryController@destroy')
        ->name('categories.destroy');

    /*
     * Brand
     */
    Route::apiResource('brands', 'Api\Brand\BrandController', [
        'only' => ['index']
    ]);

    Route::delete('brands/{brand?}', 'Api\Brand\BrandController@destroy')
        ->name('brands.destroy');
});
