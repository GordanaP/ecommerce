@extends('admin.layouts.app')

@section('content')

    <div class="flex justify-between items-center">

        <h3>Update Category</h3>

        <a href="{{ route('categories.index') }}"> All Categories</a>

    </div>

    <hr>

    <div class="w-1/2" style="margin:auto">

        @include('categories.forms._save', [

            'route' => route('categories.update', $category),
            'name' => old('name') ?: $category->name,
            'button_back' => 'Update & Update Again',
            'button_redirect' => 'Update & View Category'

        ])

    </div>

@endsection
