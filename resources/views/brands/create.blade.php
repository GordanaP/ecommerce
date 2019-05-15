@extends('admin.layouts.app')

@section('content')

    <div class="flex justify-between items-center">
        <h3>Add Brand</h3>

        <a href="{{ route('brands.index') }}"> All Brands</a>
    </div>

    <hr>

    <div class="w-1/2" style="margin:auto">

        @include('brands.forms._save', [

            'route' => route('brands.store'),
            'name' => old('name'),
            'button_back' => 'Create & Add Another Brand',
            'button_redirect' => 'Create & View Brand'

        ])

    </div>

@endsection
