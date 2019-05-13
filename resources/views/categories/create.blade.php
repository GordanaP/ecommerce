@extends('admin.layouts.app')

@section('content')

    <div class="flex justify-between items-center">
        <h3>Add Category</h3>

        <a href="{{ route('categories.index') }}"> All Categories</a>
    </div>

    <hr>

    <div class="w-1/2" style="margin:auto">

        @include('categories.forms._save', [

            'route' => route('categories.store'),
            'name' => old('name'),
            'button_back' => 'Create & Add Another Category',
            'button_redirect' => 'Create & View Category'

        ])

    </div>

@endsection
