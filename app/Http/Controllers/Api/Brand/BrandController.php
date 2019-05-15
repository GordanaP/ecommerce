<?php

namespace App\Http\Controllers\Api\Brand;

use App\Brand;
use Illuminate\Http\Request;
use App\UseCases\RemoveResource;
use App\Http\Controllers\Controller;
use App\Http\Resources\Brand\BrandResourceCollection;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::all();

        return new BrandResourceCollection($brands);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand = null)
    {
        (new RemoveResource('App\Brand', $brand))
            ->perform(request('ids'));

        return response([
            'alertMessage' => 'The record has been deleted.'
        ]);
    }
}
