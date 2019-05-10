<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('partials._head')
</head>
<body class="bg-white">
    <div id="app">

        @include('partials._navbar')

        <main>
            @yield('content')
        </main>
    </div>

    @include('partials._scripts')
</body>
</html>
