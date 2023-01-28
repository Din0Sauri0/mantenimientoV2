@extends('layouts.app')
@section('title')
    Login
@endsection
@section('content')

<div class='font-mono h-screen w-screen p-[10%] grid items-center justify-center sm:grid-cols-2 xl:grid-cols-3' style='background-color: #eee;'>
    <div class='bg-white w-full rounded-xl drop-shadow-md p-[5%]'>
        <header class='flex justify-center text-2xl font-bold'>
            Usa tus credenciales para iniciar sesion.
        </header>
        <form method="POST" action="{{ route('login') }}" class='flex flex-col p-2 gap-3 mt-3'>
            @csrf
            <label for="email" class='font-bold'>Email</label>
            <div class='relative flex items-center'>
                <svg class='absolute h-4 w-4 ml-3 pointer-events-none' xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                <input class='border-none ring-2 ring-orange-100 hover:ring-orange-400 focus:ring-2 focus:ring-orange-400 h-9 w-full pr-3 pl-10 bg-gray-100 rounded-xl' type="email" name="email" id="email">
            </div>
            @error('email') <div>{{ $message }}</div>@enderror
            
            <label for="password" class='font-bold'>Contraseña</label>
            <div class='relative flex items-center'>
                <svg class='absolute h-4 w-4 ml-3 pointer-events-none' xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 5.25a3 3 0 013 3m3 0a6 6 0 01-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1121.75 8.25z" />
                </svg>
                <input class='border-none ring-2 ring-orange-100 focus:ring-2 hover:ring-orange-400 focus:ring-orange-400 h-9 w-full pr-3 pl-10 bg-gray-100 rounded-xl' type="password" name="password" id="password">
            </div>
            @error('password') <div>{{ $message }}</div>@enderror
            <div class='flex items-center w-full'>
                <input class="" type="checkbox" name="remember" id="remember">
                <label for="remember">Recuerda me</label>
            </div>
            
            <button class='bg-orange-400 hover:bg-orange-500 hover:h-11 rounded-md h-9 text-gray-100 font-bold' type="submit">Iniciar</button>
        </form>
        <footer class='flex items-center justify-center flex-col font-bold'>
            <span>O</span>
            <a href="{{ route('register') }}" class='hover:text-sky-700 hover:underline'>Pincha aqui para registrarte</a>
        </footer>

    </div>
</div>

@endsection