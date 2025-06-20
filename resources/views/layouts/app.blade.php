<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Mi Aplicación')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body>
    <nav>
        <!-- Aquí podrías agregar un menú -->
    </nav>

    <main class="container">
        @yield('content')
    </main>

    <script src="{{ asset('js/province-toggle.js') }}"></script>
    @stack('scripts')
</body>
</html>
