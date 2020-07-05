<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="Tatalovic Ilija">
        <meta name="csrf-token" content="{{ csrf_token() }}">
    
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        
        @livewireStyles

    </head>
    <body class="bg-gray-300">
        
        @livewire('board')
        {{-- @livewire('foo-bar') --}}

        
        @livewireScripts 
        <script src="https://cdn.jsdelivr.net/gh/livewire/sortable@v0.x.x/dist/livewire-sortable.js"></script>

    </body>
</html>