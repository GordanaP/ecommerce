<form action="{{ $route }}" method="POST" enctype="multipart/form-data" >

    @csrf

    @if (request()->route('product'))
        @method('PUT')
    @endif

    <!-- Name -->
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

    <!-- Description -->
    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" id="description" rows="3" class="shadow-md form-control
        @error('description') is-invalid @enderror" placeholder="Enter description">{{ $description }}</textarea>

        @error('description')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <!-- Price -->
    <div class="form-group">
        <label for="price">Price ({{ config('app.currency') }})</label>
        <input type="text" name="price" id="price" class="shadow-md form-control
        @error('price') is-invalid @enderror" placeholder="00.00"
        value="{{ $price }}" />

        @error('price')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <!-- Category -->
    <div class="form-group">
        <label for="category_id">Category</label>
        <select name="category_id" id="category_id" class="shadow-md form-control
            @error('category_id') is-invalid @enderror"
            {{ request()->route('category') ? 'disabled' : '' }}
        >
            @if (request()->route('category'))
                <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
            @else
                <option value="">Select a category</option>
                @foreach (App\Category::all() as $category)
                    <option value="{{ $category->id }}"
                        {{ getSelected($category->id , $category_id) }}
                    >
                        {{ $category->name }}
                    </option>
                @endforeach
            @endif
        </select>

        @error('category_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <!-- Brand -->
    <div class="form-group">
        <label for="brand_id">Brand</label>
        <select name="brand_id" id="brand_id" class="shadow-md form-control
            @error('brand_id') is-invalid @enderror"
            {{ request()->route('brand') ? 'disabled' : '' }}
        >
            @if (request()->route('brand'))
                <option value="{{ $brand->id }}" selected>{{ $brand->name }}</option>
            @else
                <option value="">Select a brand</option>
                @foreach (App\Brand::all() as $brand)
                    <option value="{{ $brand->id }}"
                        {{ getSelected($brand->id , $brand_id) }}
                    >
                        {{ $brand->name }}
                    </option>
                @endforeach
            @endif
        </select>

        @error('brand_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <!-- Image -->
    <div class="form-group flex flex-col">
        <label for="image">Image</label>

        @if (! request()->route('product'))
            <input type="file" name="image" id="image"
            class="@error('image') is-invalid @enderror" />

            @error('image')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        @else
            <div class="flex">
                <span class="w-1/5 mr-3">
                    <img src="{{ $product->image->display() }}" alt="{{ $product->name }}" class="w-full">
                </span>
                <span class="w-4/5">
                    <input type="file" name="image" id="image"
                    class="@error('image') is-invalid @enderror" />

                    @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    @if ($product->image->image != null)
                        <div class="checkbox mt-6">
                            <label class="checkbox-container">
                                <input type="checkbox" class="checkitem" name="delete_image" >
                                <span class="checkmark" id="file"></span>
                            </label>
                            <span class="text-sm ml-8">Delete image</span>
                        </div>
                    @endif
                </span>
            </div>
        @endif
    </div>

    <!-- Buttons -->
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
