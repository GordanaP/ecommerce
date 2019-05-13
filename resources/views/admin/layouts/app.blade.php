<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('partials._head')
</head>

<body class="bg-white">
    <div id="app">

        @include('partials._navbar')

        <div class="container-fluid flex px-0">

            @include('admin.partials._sidebar')

            <main class="p-4 w-full">
                @yield('content')
            </main>

        </div>>

    </div>

    @include('partials._scripts')
</body>

</html>
