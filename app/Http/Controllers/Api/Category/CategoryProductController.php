<?php

namespace App\Http\Controllers\Api\Category;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Resources\Product\ProductResourceCollection;

class CategoryProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Category $category)
    {
        return new ProductResourceCollection($category->products);
    }
}
