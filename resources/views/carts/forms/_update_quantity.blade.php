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