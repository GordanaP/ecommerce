@extends('layouts.app')

@section('content')

        <div class="container-fluid flex px-0">

            @include('admin.partials._sidebar')

            <div class="p-4 w-full">
                <h3>{{ $category->name }}</h3>
                <hr>
            </div>

        </div>

@endsection