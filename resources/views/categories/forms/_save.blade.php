<form action="{{ $route }}" method="POST">

    @csrf

    @if (request()->route()->named('categories.edit'))
        @method('PUT')
    @endif

    <div class="form-group">
        <label for="name">Name</label>

        <input type="text" name="name" id="name" class="shadow-md form-control
        @error('name') is-invalid @enderror" placeholder="Enter name"
        value="{{ $name }}" />

        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group">
        <button type="submit" name="submitButton" value="DoAndDisplay"
        class="btn bg-teal-light text-white hover:bg-teal-dark pull-right">
            {{ $button_redirect }}
        </button>

        <button type="submit" name="submitButton" value="DoAndRepeat"
        class="btn bg-teal-light text-white hover:bg-teal-dark pull-right mr-2">
            {{ $button_back }}
        </button>
    </div>

</form>
