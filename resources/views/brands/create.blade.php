@extends('admin.layouts.app')

@section('content')

    @admin_save_header(['items' => 'brands'])
        Add
    @endadmin_save_header

    <div class="w-1/2" style="margin:auto">
        @include('brands.forms._save', [

            'route' => route('brands.store'),
            'name' => old('name'),
            'button_back' => 'Create & Add Another Brand',
            'button_redirect' => 'Create & View Brand'

        ])
    </div>

@endsection
