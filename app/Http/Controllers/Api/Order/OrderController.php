<?php

namespace App\Http\Controllers\Api\Order;

use App\Order;
use App\Traits\RedirectTo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\UseCases\RemoveResource;
use App\Http\Resources\Order\OrderResourceCollection;

class OrderController extends Controller
{
    use RedirectTo;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() : OrderResourceCollection
    {
        $orders = Order::all();

        return new OrderResourceCollection($orders);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order = null)
    {
        (new RemoveResource('App\Order', $order))
            ->perform(request('ids'));

        return response([
            'alertMessage' => 'The record has been deleted.'
        ]);
    }
}
