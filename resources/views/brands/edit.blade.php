@extends('admin.layouts.app')

@section('content')

    <div class="flex justify-between items-center">

        <h3>Update Brand</h3>

        <a href="{{ route('brands.index') }}"> All Brands</a>

    </div>

    <hr>

    <div class="w-1/2" style="margin:auto">

        @include('brands.forms._save', [

            'route' => route('brands.update', $brand),
            'name' => old('name') ?: $brand->name,
            'button_back' => 'Update & Update Again',
            'button_redirect' => 'Update & View Brand'

        ])

    </div>

@endsection
