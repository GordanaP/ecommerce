@extends('admin.layouts.app')

@section('content')

    <h3>Pay Order</h3>

    <hr>

    {{-- <form action="{{ route('orders.store') }}" method="POST">

        @csrf

        <button type="submit" class="btn bg-indigo-light text-white hover:bg-indigo-dark">
            <svg class="fill-current text-white h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M18 6V4H2v2h16zm0 4H2v6h16v-6zM0 4c0-1.1.9-2 2-2h16a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm4 8h4v2H4v-2z"/></svg>

            <span>Pay Order</span>
        </button>

    </form>
 --}}


    <form action='https://sandbox.2checkout.com/checkout/purchase' method='POST'>
        <input type='hidden' name='sid' value='901408092' >
        <input type='hidden' name='mode' value='2CO' >
        @for ($i = 0; $i < $items->count(); $i++)
            <input type='hidden' name="{{ 'li_'.$i.'_type' }}" value='product' >
            <input type='hidden' name="{{ 'li_'.$i.'_name' }}" value="{{ $items[$i]->name }}" >
            <input type='hidden' name="{{ 'li_'.$i.'_price' }}" value="{{ Price::toUnit($items[$i]->price) }}" >
            <input type='hidden' name="{{ 'li_'.$i.'_quantity' }}" value="{{ $items[$i]->qty }}" >
            <input type='hidden' name="{{ 'li_'.$i.'_tangible' }}" value='N' >
            <input type='hidden' name="sales_tax" value='0.2' >
        @endfor

        <input name='submit' type='submit' class="btn btn-primary" value='Checkout' >
    </form>


@endsection