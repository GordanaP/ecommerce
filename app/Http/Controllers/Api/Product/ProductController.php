<?php

namespace App\Http\Controllers\Api\Product;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\UseCases\RemoveResource;
use App\Http\Resources\Product\ProductResourceCollection;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() : ProductResourceCollection
    {
        $products = Product::all();

        return new ProductResourceCollection($products);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product = null)
    {
        (new RemoveResource('App\Product', $product))
            ->perform(request('ids'));

        return response([
            'alertMessage' => 'The record has been deleted.'
        ]);
    }
}
