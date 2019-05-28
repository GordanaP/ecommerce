@extends('admin.layouts.app')

@section('content')

    <h3>Pay Order</h3>

    <hr>

    {{ ShoppingCart::getContent() }}

@endsection