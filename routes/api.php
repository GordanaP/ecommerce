<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::name('api.')->group(function () {
    Route::apiResource('categories', 'Api\Category\CategoryController', [
        'only' => ['index', 'destroy'],
    ]);
});
