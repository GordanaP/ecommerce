<?php

namespace App\Http\Controllers\Cart;

use App\Product;
use Illuminate\Http\Request;
use App\Facades\ShoppingCart;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('carts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Product $product)
    {
        if(ShoppingCart::hasProduct($product)) {

            if (request()->ajax()) {
                $response = response([
                    'message' => 'The item is already in your cart.'
                ]);
            }
            else {
                $response = back()->with(getAlert('The item is already in your cart.', 'success'));
            }
        }
        else{
            ShoppingCart::addItem($product, 1);

            if (request()->ajax()) {
                $response = response([
                    'message' => 'A new item has been added to your cart.'
                ]);
            }
            else {
                $response = back()->with(getAlert('A new item has been added to your cart.', 'success'));
            }
        }

        return $response;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $cartItems = ShoppingCart::getItems();

        return view('carts.show', compact('cartItems'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $rowId)
    {
        ShoppingCart::updateItem($rowId, $request->qty);

        return back()
            ->with(getAlert('The cart has been updated', 'success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($rowId)
    {
        ShoppingCart::removeItem($rowId);

        return back()
            ->with(getAlert('The item has been removed from the cart.', 'success'));
    }

    /**
     * Remove all items from the shopping cart.
     *
     * @return \Illuminate\Http\Response
     */
    public function empty()
    {
        ShoppingCart::empty();

        return redirect()->route('carts.create')
            ->with(getAlert('The cart is empty', 'success'));
    }

}
