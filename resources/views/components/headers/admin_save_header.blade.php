<div class="flex justify-between items-center">
    <h3>{{ $slot }} {{ ucfirst(str_singular($items)) }}</h3>

    <a href="{{ route($items.'.index') }}"> All {{ ucfirst($items) }}</a>
</div>

<hr>