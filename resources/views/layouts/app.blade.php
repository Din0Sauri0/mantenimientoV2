<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @stack('styles')
    @livewireStyles
    @vite(['resources/css/app.css','resources/js/app.js'])
    @yield('scripts')
    <title>@yield('title')</title>
</head>
<body class="relative">
    <div class='w-screen relative lg:h-screen 2xl:flex 2xl:flex-row xl:flex xl:flex-row lg:flex lg:flex-row md:flex md:flex-row sm:flex sm:flex-row' style='background-color: #eee;'>
        @auth
        <nav class='bg-orange-400 text-white xl:w-1/6 lg:w-1/6 md:w-1/6 sm:w-1/6 xl:h-full lg:h-full md:full sm:h-full flex flex-col'>
            <div class='w-full flex justify-between p-3 items-center'>
                <div>
                    <img class="rounded-full lg:w-auto w-[50%]" src="{{ asset('img/logo2.png') }}" alt="">
                </div>
                <div onclick='openMenu()' class='lg:hidden xl:hidden sm:hidden'>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 5.25h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5" />
                    </svg>
                </div>
            </div>
    
            <div id='menu' class='h-full flex justify-between flex-col hidden p-3 xl:inline-flex lg:inline-flex sm:inline-flex'>
                <div class='flex flex-col '>
                    <a class='flex justify-end p-3 rounded-md hover:bg-orange-600 xl:justify-start lg:justify-start sm:justify-start' href="{{ route('project') }}">Proyectos</a>
                    <a class='flex justify-end p-3 rounded-md hover:bg-orange-600 xl:justify-start lg:justify-start sm:justify-start' href="{{ route('client') }}">Clientes</a>
                    <a class='flex justify-end p-3 rounded-md hover:bg-orange-600 xl:justify-start lg:justify-start sm:justify-start' href="{{ route('worker') }}">Trabajadores</a>
                    <a class='flex justify-end p-3 rounded-md hover:bg-orange-600 xl:justify-start lg:justify-start sm:justify-start' href="{{ route('product') }}">Equipos</a>
                </div>
                <div>
                    <a href="{{ route('logout') }}" class='flex justify-end p-3 rounded-md text-red-900 hover:bg-orange-600 xl:justify-start lg:justify-start sm:justify-start text-red'>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                        </svg>
                        Salir
                    </a>
                </div>
            </div>
        </nav>
        @endauth
        @yield('content')
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.js"></script>

    
    <script>
    
        const openMenu = () => {
            const menu = document.getElementById('menu');
            if(menu.classList.contains('hidden')){
                menu.classList.remove('hidden');
            }else{
                menu.classList.add('hidden');
            }
        }
    </script>

    @livewireScripts
</body>
</html>