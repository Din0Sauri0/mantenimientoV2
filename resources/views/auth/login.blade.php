@extends('layouts.app')
@section('title')
    Login
@endsection
@section('content')

<div class='font-mono h-screen w-screen flex flex-col-reverse items-center justify-center pb-3 sm:pr-5 sm:grid  sm:gap-5 sm:pl-3 xl:grid xl:gap-5 xl:pl-3 sm:grid-cols-2 xl:grid-cols-2 ' style='background-color: #eee;'>
    <div class='bg-white sm:w-[70%] rounded-xl drop-shadow-md p-[5%] mx-3'>
        <header class='flex justify-center text-2xl font-bold'>
            Usa tus credenciales para iniciar sesión.
        </header>
        <form method="POST" action="{{ route('login') }}" class='flex flex-col p-2 gap-3 mt-3'>
            @csrf
            <label for="email" class='font-bold @error('email') text-red-700 @enderror'>Correo</label>
            <div class='relative flex items-center'>
                <svg class='absolute h-4 w-4 ml-3 pointer-events-none' xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                <input placeholder="Correo electrónico" class='bg-gray-100 border-orange-400 text-sm rounded-lg block w-full p-2.5 pl-9 @error('email')bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 @enderror' type="email" name="email" id="email">
            </div>
            @error('email')<p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{ $message }}</p>@enderror
            
            <label for="password" class='font-bold @error('password') text-red-700 @enderror'>Contraseña</label>
            <div class='relative flex items-center'>
                <svg class='absolute h-4 w-4 ml-3 pointer-events-none' xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 5.25a3 3 0 013 3m3 0a6 6 0 01-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1121.75 8.25z" />
                </svg>
                <input placeholder="Contraseña" class='bg-gray-100 border-orange-400 text-sm rounded-lg block w-full p-2.5 pl-9 @error('password')bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 @enderror' type="password" name="password" id="password">
            </div>
            @error('password')<p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{ $message }}</p>@enderror
            <div class='flex items-center w-full'>
                <input class="mr-2 rounded-full" type="checkbox" name="remember" id="remember">
                <label for="remember">Recuerdame</label>
            </div>
            
            <button class='bg-orange-400 hover:bg-orange-500 hover:h-11 rounded-md h-9 text-gray-100 font-bold' type="submit">Iniciar</button>
        </form>
        <footer class='flex items-center justify-center flex-col font-bold'>
            <a href="{{ route('register') }}" class='hover:text-sky-700 hover:underline'>Pincha aquí para registrarte</a>
        </footer>
    </div>
    <div class="w-full h-[90%] grid items-center justify-center">
        <img class="rounded-full w-[100%]" src="{{ asset('img/logo2.png') }}" alt="">
    </div>
</div>

@endsection