<x-app-layout>
    <x-slot name="title">
        Dashboard
    </x-slot>
    @push('dashboard')
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
            rel="stylesheet" />
        <link rel="stylesheet" href="./assets/css/tailwind.output.css" />
        <script src="./assets/js/init-alpine.js"></script>
    @endpush
   
  
    <x-slot name="aside">
        <x-Aside>
        </x-Aside>
    </x-slot>    

    <x-slot name="header">
        <x-Header>
        </x-Header>
    </x-slot>

    <x-slot name="main">
        <x-Main>
        </x-Main>
    </x-slot>

</x-app-layout>