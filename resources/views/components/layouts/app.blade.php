<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Livewire 3 - @yield('page-title')</title>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="antialiased bg-gradient-to-r from-slate-50 to-slate-100">
        <div class="flex w-full py-4 px-6 justify-between space-x-4 ">
            <div>
                <a href="/">Home</a>
            </div>
            <div>
                <a href="/todo">To do</a>
                <a href="/counter">Add new user</a>
            </div>
        </div>
        <main class="flex justify-center">
            {{ $slot }}
        </main>
    </body>
</html>
