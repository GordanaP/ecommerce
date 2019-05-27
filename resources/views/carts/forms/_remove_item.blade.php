<form action="{{ route('carts.destroy', $rowId) }}" method="POST">
    @csrf
    @method('DELETE')

    <button type="submit">
        <svg class="fill-current text-grey-dark hover:text-grey-darker inline-block h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M6 2l2-2h4l2 2h4v2H2V2h4zM3 6h14l-1 14H4L3 6zm5 2v10h1V8H8zm3 0v10h1V8h-1z"/></svg>
    </button>
</form>