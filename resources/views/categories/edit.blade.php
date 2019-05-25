@extends('admin.layouts.app')

@section('content')

    @admin_save_header(['items' => 'categories'])
        Update
    @endadmin_save_header

    <div class="w-1/2 mx-auto">
        @include('categories.forms._save', [

            'route' => route('categories.update', $category),
            'name' => old('name') ?: $category->name,
            'button_back' => 'Update & Update Again',
            'button_redirect' => 'Update & View Category'

        ])
    </div>

@endsection
