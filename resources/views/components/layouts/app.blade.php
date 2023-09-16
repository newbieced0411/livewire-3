<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Livewire 3 - @yield('page-title')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" />
    
    {{-- Scripts --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>

    @livewireStyles
</head>

<body class="antialiased bg-gradient-to-r from-slate-50 to-slate-100">
    <div class="flex w-full py-4 px-6 justify-between space-x-4 ">
        <div>
            <a href="/">Home</a>
        </div>
        <div class="flex gap-x-4">
            <a href="/todo" class="border-b-2 border-black">To do</a>
            <a href="/counter" class="border-b-2 border-black">Add new user</a>
        </div>
    </div>
    <main class="flex justify-center">
        {{ $slot }}
    </main>

    @stack('scripts')
    @livewireScripts
</body>

</html>
