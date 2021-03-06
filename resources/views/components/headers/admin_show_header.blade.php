<div class="flex justify-between items-center">

    <h3>{{ ucfirst(str_singular($slot)) }} details</h3>

    <div class="flex">
        <a href="{{ route($slot.'.index') }}" class="mr-3">All {{ ucfirst($slot) }}</a>

        <span class="flex">
            @if (! request()->route('order'))
                <a href="{{ route($slot.'.edit', $parameter) }}">
                    <svg class="fill-current text-orange-light hover:text-orange-dark inline-block h-6 w-6 mr-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2 4v14h14v-6l2-2v10H0V2h10L8 4H2zm10.3-.3l4 4L8 16H4v-4l8.3-8.3zm1.4-1.4L16 0l4 4-2.3 2.3-4-4z"/></svg>
                </a>
            @endif

            <form action="{{ route($slot.'.destroy', $parameter) }}" method="POST">

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