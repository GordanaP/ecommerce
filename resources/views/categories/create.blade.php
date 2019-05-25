@extends('admin.layouts.app')

@section('content')

    @admin_save_header(['items' => 'categories'])
        Add
    @endadmin_save_header

    <div class="w-1/2 mx-auto">
        @include('categories.forms._save', [

            'route' => route('categories.store'),
            'name' => old('name'),
            'button_back' => 'Create & Add Another Category',
            'button_redirect' => 'Create & View Category'
        ])
    </div>

@endsection
