<?php

namespace App\Http\Controllers\Api\Brand;

use App\Brand;
use App\Http\Controllers\Controller;
use App\Http\Resources\Product\ProductResourceCollection;

class BrandProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Brand $brand)
    {
        return new ProductResourceCollection($brand->products);
    }
}
