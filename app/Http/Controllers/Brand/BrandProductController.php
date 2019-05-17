<?php

namespace App\Http\Controllers\Brand;

use App\Brand;
use App\Product;
use App\Traits\RedirectTo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BrandProductController extends Controller
{
    use RedirectTo;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Brand $brand)
    {
        return view('products.index', compact('brand'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Brand $brand)
    {
        return view('products.create', compact('brand'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Brand $brand)
    {
        $product = Product::createNew($request->except('brand_id'), null, $brand);

        return $this->redirectAfterStoring('products', $product)
            ->with($this->storeResponse());
    }
}
