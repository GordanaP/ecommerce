<?php

namespace App\Http\Controllers\Cart;

use Illuminate\Http\Request;
use App\Facades\ShoppingCart;
use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerRequest;

class CartCustomerController extends Controller
{
    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\CustomerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ShoppingCart::addCustomer($request->all());

        return redirect()->route('payments.create');
    }
}
