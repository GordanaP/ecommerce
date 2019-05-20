<div class="flex">
    <p class="w-1/5 uppercase text-sm text-grey-darkest font-bold">Products</p>
    <p class="text-grey-dark">
        <span class="mr-8">
            <svg xmlns="http://www.w3.org/2000/svg" class="fill-current text-blue-light mr-1" width="4%" viewBox="0 0 20 20"><path d="M0 3h20v2H0V3zm0 4h20v2H0V7zm0 4h20v2H0v-2zm0 4h20v2H0v-2z"/></svg>

            <a href="{{ route($slot.'.products.index', $model) }}">View products</a>
        </span>

        <span>
            <svg xmlns="http://www.w3.org/2000/svg" class="fill-current text-blue-light mr-1" width="4%" viewBox="0 0 20 20"><path d="M11 9V5H9v4H5v2h4v4h2v-4h4V9h-4zm-1 11a10 10 0 1 1 0-20 10 10 0 0 1 0 20z"/></svg>

            <a href="{{ route($slot.'.products.create', $model) }}">Add a product</a>
        </span>
    </p>
</div>