@extends('layouts.app')
@section('title')
    Crea tu cuenta!
@endsection
@section('content')
<div class=" flex flex-col-reverse justify-center items-center p-3 md:grid md:grid-cols-2 lg:px-10 lg:grid lg:grid-cols-2 xl:px-16 xl:grid xl:grid-cols-2">
    <div class='bg-white sm:w-[70%] rounded-xl drop-shadow-md p-5 overflow-auto'>
        <header class='flex justify-center text-2xl font-bold'>
            Rellena el formulario para registrarte.
        </header>
        <form action="{{ route('register.post') }}" method="POST" class='flex flex-col p-2 gap-3 mt-3 overflow-y-scroll h-96'>
            @csrf
            <div class="flex flex-col">
                <label for="id" class='font-bold @error('id') text-red-700 @enderror'>Rut</label>
                <div class='relative flex items-center'>
                    <svg class='absolute h-4 w-4 ml-3 pointer-events-none' xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5zm6-10.125a1.875 1.875 0 11-3.75 0 1.875 1.875 0 013.75 0zm1.294 6.336a6.721 6.721 0 01-3.17.789 6.721 6.721 0 01-3.168-.789 3.376 3.376 0 016.338 0z" />
                    </svg>
                    <input class='bg-gray-100 border-orange-400 text-sm rounded-lg block w-full p-2.5 pl-9 @error('id')bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 @enderror' type="text" name="id" id="id">
                </div>
                @error('id')<p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{ $message }}</p>@enderror
            </div>
            <div class="flex flex-col">
                <label for="name" class='font-bold @error('name') text-red-700 @enderror'>Nombre de la empresa</label>
                <div class='relative flex items-center'>
                    <svg class='absolute h-4 w-4 ml-3 pointer-events-none' xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21" />
                    </svg>
                    <input class='bg-gray-100 border-orange-400 text-sm rounded-lg block w-full p-2.5 pl-9 @error('name')bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 @enderror' type="text" name="name" id="name">
                </div>
                @error('name')<p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{ $message }}</p>@enderror
            </div>
            <div class="flex flex-col">
                <label for="direccion" class='font-bold @error('address') text-red-700 @enderror'>Dirección</label>
                <div class='relative flex items-center'>
                    <svg class='absolute h-4 w-4 ml-3 pointer-events-none' xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                    </svg>
                    <input class='bg-gray-100 border-orange-400 text-sm rounded-lg block w-full p-2.5 pl-9 @error('address')bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 @enderror' type="text" name="address" id="address">
                </div>
                @error('address')<p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{ $message }}</p>@enderror
            </div>
            <div class="flex flex-col">
                <label for="direccion" class='font-bold @error('email') text-red-700 @enderror'>Correo electronico</label>
                <div class='relative flex items-center'>
                    <svg class='absolute h-4 w-4 ml-3 pointer-events-none' xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                    </svg>
                    <input class='bg-gray-100 border-orange-400 text-sm rounded-lg block w-full p-2.5 pl-9 @error('email')bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 @enderror' type="email" name="email" id="email">
                </div>
                @error('email')<p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{ $message }}</p>@enderror
            </div>
            <div class="flex flex-col">
                <label for="password" class='font-bold @error('password') text-red-700 @enderror'>Contraseña</label>
                <div class='relative flex items-center'>
                    <svg class='absolute h-4 w-4 ml-3 pointer-events-none' xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 5.25a3 3 0 013 3m3 0a6 6 0 01-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1121.75 8.25z" />
                    </svg>
                    <input class='bg-gray-100 border-orange-400 text-sm rounded-lg block w-full p-2.5 pl-9 @error('password')bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 @enderror' type="password" name="password" id="password">
                </div>    
                @error('password')<p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{ $message }}</p>@enderror
            </div>
            <div class="flex flex-col">
                <label for="re-password" class='font-bold @error('password_confirmation') text-red-700 @enderror'>Repetir contraseña</label>
                <div class='relative flex items-center'>
                    <svg class='absolute h-4 w-4 ml-3 pointer-events-none' xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 5.25a3 3 0 013 3m3 0a6 6 0 01-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1121.75 8.25z" />
                    </svg>
                    <input class='bg-gray-100 text-sm rounded-lg block w-full p-2.5 pl-9 border-orange-400 @error('password_confirmation')bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 @enderror' type="password" name="password_confirmation" id="password_confirmation">
                </div>
                @error('password_confirmation')<p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{ $message }}</p>@enderror
            </div>
            <button class='bg-orange-400 hover:bg-orange-500 hover:h-11 rounded-md h-9 text-gray-100 font-bold' type="submit">Registrar</button>
        </form>
        <footer class='flex items-center justify-center flex-col font-bold'>
            <span>O</span>
            <a href="{{ route('login') }}" class='hover:text-sky-700 hover:underline'>Pincha aqui para iniciar sesion</a>
        </footer>
    </div>

    <div class="w-full h-full grid items-center justify-center">
        <img class="rounded-full w-[100%]" src="{{ asset('img/logo2.png') }}" alt="">
    </div>
</div>
@endsection