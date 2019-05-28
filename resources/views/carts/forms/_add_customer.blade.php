<!-- First Name -->
<div class="form-group">
    <label for="first_name">First Name</label>
    <input type="text" name="first_name" id="first_name" class=" form-control
    @error('first_name') is-invalid @enderror" placeholder="Enter first name"
    value="{{ $first_name }}" />

    @error('first_name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<!-- Last Name -->
<div class="form-group">
    <label for="last_name">Last Name</label>
    <input type="text" name="last_name" id="last_name" class=" form-control
    @error('last_name') is-invalid @enderror" placeholder="Enter last name"
    value="{{ $last_name }}" />

    @error('last_name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<!-- Address -->
<div class="form-group">
    <label for="address">Street Address</label>
    <input type="text" name="address" id="address" class=" form-control
    @error('address') is-invalid @enderror" placeholder="Enter street address"
    value="{{ $address }}" />

    @error('address')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="flex">
    <!-- Postal Code -->
    <div class="form-group w-full pr-1">
        <label for="postal_code">ZIP code</label>
        <input type="text" name="postal_code" id="postal_code" class=" form-control
        @error('postal_code') is-invalid @enderror" placeholder="Enter postal code"
        value="{{ $postal_code }}" />

        @error('postal_code')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <!-- City -->
    <div class="form-group w-full pl-1">
        <label for="city">City</label>
        <input type="text" name="city" id="city" class=" form-control
        @error('city') is-invalid @enderror" placeholder="Enter city"
        value="{{ $city }}" />

        @error('city')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<!-- Email -->
<div class="form-group">
    <label for="email">E-mail address</label>
    <input type="text" name="email" id="email" class=" form-control
    @error('email') is-invalid @enderror" placeholder="example@domain.com"
    value="{{ $email }}" />

    @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<!-- Phone Number -->
<div class="form-group">
    <label for="phone">Phone Number</label>
    <input type="text" name="phone" id="phone" class=" form-control
    @error('phone') is-invalid @enderror" placeholder="Enter phone number"
    value="{{ $phone }}" />

    @error('phone')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
