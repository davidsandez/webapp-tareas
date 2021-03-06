<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" :class="{ 'theme-dark': dark }" x-data="data()">         
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        @if (isset($title))
            <title> {{$title}} </title>
        @else
            <title>{{ config('app.name', 'Laravel') }}</title>        
        @endif

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <!-- assets dashboard -->
        @stack('dashboard')
    </head>
    <body>
        
            <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
                @if (isset($aside))
                    {{$aside}}
                @endif
                <!-- Page Heading -->
                <div class="flex flex-col flex-1 w-full">
                    @if (isset($header))
                        {{ $header }}
                    @endif
                    @if (isset($main))
                        {{$main}}
                    @endif
                </div>    
            </div>    

        @stack('modals')
        @livewireScripts
    </body>
</html>
