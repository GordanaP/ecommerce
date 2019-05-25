<?php

namespace App\Http\Controllers\Api\Customer;

use App\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\UseCases\RemoveResource;
use App\Http\Resources\Customer\CustomerResourceCollection;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() : CustomerResourceCollection
    {
        $customers = Customer::all();

        return new CustomerResourceCollection($customers);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer = null)
    {
        (new RemoveResource('App\Customer', $customer))
            ->perform(request('ids'));

        return response([
            'alertMessage' => 'The record has been deleted.'
        ]);
    }
}
