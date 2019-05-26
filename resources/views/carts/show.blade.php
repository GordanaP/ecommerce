@extends('admin.layouts.app')

@section('content')

    <div class="flex justify-between">

        <h3>View Cart</h3>

        <a href="#" class="btn bg-indigo-light text-white hover:bg-indigo-dark">
            <svg class="fill-current text-white inline-block h-4 w-4 mr-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M4 2h16l-3 9H4a1 1 0 1 0 0 2h13v2H4a3 3 0 0 1 0-6h.33L3 5 2 2H0V0h3a1 1 0 0 1 1 1v1zm1 18a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm10 0a2 2 0 1 1 0-4 2 2 0 0 1 0 4z"/></svg> <span>Checkout</span>
        </a>

    </div>

    <hr>

    <table class="table bg-white border-b border-grey-light" id="displayCartTable">
        <thead class="bg-grey-dark uppercase text-white">
            <th width="10%">Item</th>
            <th width="23%"></th>
            <th width="20%" class="text-center">Price</th>
            <th width="12%">Qty</th>
            <th width="13%" class="text-right">Subtotal</th>
            <th width="12%" class="text-center"><i class="fa fa-cog"></i></th>
        </thead>

        <tbody>

            <!-- Cart items -->
            @foreach ($cartItems as $rowId => $item)
                <tr>
                    <!-- Imagw -->
                    <td class="border-b border-grey-light">
                            <img src="{{ $item->image->display() }}" alt="" class="w-1/2 mx-auto rounded-sm">
                    </td>

                    <!-- Sku, Name & Description -->
                    <td class="border-b border-grey-light">
                        <p class="mb-2 text-muted text-xs">
                            SKU
                        </p>

                        <p class="mb-1 font-semibold">
                            <a href="{{ route('products.show', $item->id) }}">
                                {{ $item->name }}
                            </a>
                        </p>
                        <p class="text-xs mb-0 text-muted">
                            {{ $item->description }}
                        </p>
                    </td>

                    <!-- Price -->
                    <td class="border-b border-grey-light text-center">
                        {{ Price::present($item->price) }}
                    </td>

                    <!-- Qty -->
                    <td class="border-b border-grey-light">
                        <form action="{{ route('carts.update', $rowId) }}" method="POST">

                            @csrf
                            @method("PATCH")

                            <div class="flex">
                                <div class="form-group">
                                    <input type="text" name="qty" id="qty" class="form-control text-center @error('qty') is-invalid @enderror" value="{{ $item->qty }}" />

                                    @error('qty')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn">
                                        <svg class="fill-current text-grey-dark hover:text-grey-darker h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 3v2a5 5 0 0 0-3.54 8.54l-1.41 1.41A7 7 0 0 1 10 3zm4.95 2.05A7 7 0 0 1 10 17v-2a5 5 0 0 0 3.54-8.54l1.41-1.41zM10 20l-4-4 4-4v8zm0-12V0l4 4-4 4z"/></svg>
                                    </button>
                                </div>
                            </div>

                        </form>
                    </td>

                    <!-- Item subtotal -->
                    <td class="border-b border-grey-light text-right">
                        {{ Price::present($item->subtotal) }}
                    </td>

                    <!-- Trash -->
                    <td class="border-b border-grey-light text-center">
                        <form action="{{ route('carts.destroy', $rowId) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button type="submit">
                                <svg class="fill-current text-grey-dark hover:text-grey-darker inline-block h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M6 2l2-2h4l2 2h4v2H2V2h4zM3 6h14l-1 14H4L3 6zm5 2v10h1V8H8zm3 0v10h1V8h-1z"/></svg>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach

            <!-- Cart price -->
            {{-- @include('carts.html._price') --}}

        </tbody>
    </table>


@endsection

