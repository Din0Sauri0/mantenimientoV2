@extends('layouts.app')
@section('title')
    Crea tu cuenta!
@endsection
@section('content')
<div class="p-5 xl:px-16 xl:grid xl:grid-cols-4 lg:px-10 lg:grid lg:grid-cols-3 md:grid md:grid-cols-2 justify-center items-center h-screen">
    <div class='bg-white w-full rounded-xl drop-shadow-md p-5 overflow-auto'>
        <header class='flex justify-center text-2xl font-bold'>
            Rellena el formulario para registrarte.
        </header>
        <form action="{{ route('register.post') }}" method="POST" class='flex flex-col p-2 gap-3 mt-3'>
            @csrf
            <div class="flex flex-col">
                <label for="id" class='font-bold'>Rut</label>
                <div class='relative flex items-center'>
                    <svg class='absolute h-4 w-4 ml-3 pointer-events-none' xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5zm6-10.125a1.875 1.875 0 11-3.75 0 1.875 1.875 0 013.75 0zm1.294 6.336a6.721 6.721 0 01-3.17.789 6.721 6.721 0 01-3.168-.789 3.376 3.376 0 016.338 0z" />
                    </svg>
                    <input class='border-none ring-2 ring-orange-100 hover:ring-orange-400 focus:ring-2 focus:ring-orange-400 h-9 w-full pr-3 pl-10 bg-gray-100 rounded-xl' type="text" name="id" id="id">
                </div>
            </div>
            <div class="flex flex-col">
                <label for="name" class='font-bold'>Nombre de la empresa</label>
                <div class='relative flex items-center'>
                    <svg class='absolute h-4 w-4 ml-3 pointer-events-none' xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21" />
                    </svg>
                    <input class='border-none ring-2 ring-orange-100 hover:ring-orange-400 focus:ring-2 focus:ring-orange-400 h-9 w-full pr-3 pl-10 bg-gray-100 rounded-xl' type="text" name="name" id="name">
                </div>
            </div>
            <div class="flex flex-col">
                <label for="direccion" class='font-bold'>Dirección</label>
                <div class='relative flex items-center'>
                    <svg class='absolute h-4 w-4 ml-3 pointer-events-none' xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                    </svg>
                    <input class='border-none ring-2 ring-orange-100 hover:ring-orange-400 focus:ring-2 focus:ring-orange-400 h-9 w-full pr-3 pl-10 bg-gray-100 rounded-xl' type="text" name="address" id="address">
                </div>
            </div>
            <div class="flex flex-col">
                <label for="direccion" class='font-bold'>Correo electronico</label>
                <div class='relative flex items-center'>
                    <svg class='absolute h-4 w-4 ml-3 pointer-events-none' xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                    </svg>
                    <input class='border-none ring-2 ring-orange-100 hover:ring-orange-400 focus:ring-2 focus:ring-orange-400 h-9 w-full pr-3 pl-10 bg-gray-100 rounded-xl' type="email" name="email" id="email">
                </div>
            </div>
            <div class="flex flex-col">
                <label for="password" class='font-bold'>Contraseña</label>
                <div class='relative flex items-center'>
                    <svg class='absolute h-4 w-4 ml-3 pointer-events-none' xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 5.25a3 3 0 013 3m3 0a6 6 0 01-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1121.75 8.25z" />
                    </svg>
                    <input class='border-none ring-2 ring-orange-100 focus:ring-2 hover:ring-orange-400 focus:ring-orange-400 h-9 w-full pr-3 pl-10 bg-gray-100 rounded-xl' type="password" name="password" id="password">
                </div>    
            </div>
            <div class="flex flex-col">
                <label for="re-password" class='font-bold'>Repetir contraseña</label>
                <div class='relative flex items-center'>
                    <svg class='absolute h-4 w-4 ml-3 pointer-events-none' xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 5.25a3 3 0 013 3m3 0a6 6 0 01-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1121.75 8.25z" />
                    </svg>
                    <input class='border-none ring-2 ring-orange-100 focus:ring-2 hover:ring-orange-400 focus:ring-orange-400 h-9 w-full pr-3 pl-10 bg-gray-100 rounded-xl' type="password" name="password_confirmation" id="password_confirmation">
                </div>
            </div>
            <button class='bg-orange-400 hover:bg-orange-500 hover:h-11 rounded-md h-9 text-gray-100 font-bold' type="submit">Registrar</button>
        </form>
        <footer class='flex items-center justify-center flex-col font-bold'>
            <span>O</span>
            <a href="{{ route('login') }}" class='hover:text-sky-700 hover:underline'>Pincha aqui para iniciar sesion</a>
        </footer>
    
    </div>
</div>
@endsection