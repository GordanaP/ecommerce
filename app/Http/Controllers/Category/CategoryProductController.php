<?php

namespace App\Http\Controllers\Category;

use App\Product;
use App\Category;
use App\Traits\RedirectTo;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;

class CategoryProductController extends Controller
{
    use RedirectTo;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Category $category)
    {
        return view('products.index', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Category $category)
    {
        return view('products.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request, Category $category)
    {
        $product = Product::createNew($request->except('category_id'), $category);

        return $this->redirectAfterStoring('products', $product)
            ->with($this->storeResponse());
    }
}
