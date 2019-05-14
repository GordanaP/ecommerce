<?php

namespace App\Http\Controllers\Api\Category;

use App\Category;
use Illuminate\Http\Request;
use App\UseCases\RemoveResource;
use App\Http\Controllers\Controller;
use App\Http\Resources\Category\CategoryResourceCollection;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();

        return new CategoryResourceCollection($categories);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category = null)
    {
        (new RemoveResource('App\Category', $category))
            ->perform(request('ids'));

        return response([
            'alertMessage' => 'The record has been deleted.'
        ]);
    }
}