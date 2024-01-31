<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        @vite('resources/css/app.css')
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <script src="{{asset('js/app.js')}}"></script>
        <!-- Styles -->

    </head>
    <body class="bg-gray-100">
        <header class="p-5 border-b bg-white shadow">
            <div class="container mx-auto flex justify-between">
            <h1 class="text-3xl font-black"> Prueba Tecnica</h1>
            <nav>
                <a href="{{route('login')}}" class="font-bold uppercase text-gray-600 text-sm items-center">Login</a>
                <a href="{{route('register')}}" class="font-bold uppercase text-gray-600 text-sm items-center">Crear Cuenta</a>
            </nav>
            </div>
        </header>
        <main class="container mx-auto mt-10">
            <h1 class="font-black text-center text-3xl mb-10">
                 @yield('Titulo')
            </h1>
            @yield('contenido')
        </main>
        <footer>

        </footer>
    </body>
</html>
