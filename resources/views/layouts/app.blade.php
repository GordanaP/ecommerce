<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('partials._head')
</head>
<body>
    <div id="app">

        @include('partials._navbar')

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    @include('partials._scripts')
</body>
</html>
