@extends('admin.layouts.app')

@section('content')

    <div class="flex justify-between items-center">

        <h3>Brand details</h3>

        <div class="flex">
            <a href="{{ route('brands.index') }}" class="mr-3">All brands</a>

            <span class="flex">
                <a href="{{ route('brands.edit', $brand) }}">
                    <svg class="fill-current text-orange-light hover:text-orange-dark inline-block h-6 w-6 mr-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2 4v14h14v-6l2-2v10H0V2h10L8 4H2zm10.3-.3l4 4L8 16H4v-4l8.3-8.3zm1.4-1.4L16 0l4 4-2.3 2.3-4-4z"/></svg>
                </a>

                <form action="{{ route('brands.destroy', $brand) }}" method="POST">

                    @csrf
                    @method('DELETE')

                    <button type="submit">
                        <svg class="fill-current text-red-light hover:text-red-dark inline-block h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M6 2l2-2h4l2 2h4v2H2V2h4zM3 6h14l-1 14H4L3 6zm5 2v10h1V8H8zm3 0v10h1V8h-1z"/></svg>
                    </button>
                </form>
            </span>
        </div>

    </div>

    <hr>

    <div class="card">

        <div class="card-body">

            <div class="flex">
                <p class="w-1/5 uppercase text-sm text-grey-darkest font-bold">Id</p>
                <p class="text-grey-dark">{{ $brand->id }}</p>
            </div>

            <hr>

            <div class="flex">
                <p class="w-1/5 uppercase text-sm text-grey-darkest font-bold">Name</p>
                <p class="text-grey-dark">{{ $brand->name }}</p>
            </div>

            <hr>

            <div class="flex">
                <p class="w-1/5 uppercase text-sm text-grey-darkest font-bold">Created</p>
                <p class="text-grey-dark">{{ $brand->created_at }}</p>
            </div>

            <hr>

            <div class="flex">
                <p class="w-1/5 uppercase text-sm text-grey-darkest font-bold">Last change</p>
                <p class="text-grey-dark">{{ $brand->updated_at }}</p>
            </div>

            <hr>

            <div class="flex">
                <p class="w-1/5 uppercase text-sm text-grey-darkest font-bold">Products</p>
                <p class="text-grey-dark">
                    <svg xmlns="http://www.w3.org/2000/svg" class="fill-current text-blue-light mr-1" width="8%" viewBox="0 0 20 20"><path d="M0 3h20v2H0V3zm0 4h20v2H0V7zm0 4h20v2H0v-2zm0 4h20v2H0v-2z"/></svg>

                    <a href="#">View</a>
                </p>
            </div>

        </div>

    </div>

@endsection