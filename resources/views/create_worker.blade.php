@extends('layouts.app')
@section('title')
    Registrar trabajador
@endsection
@section('content')
<div class="p-5 w-full grid gap-5 justify-center items-center">
    <form action="{{ route('worker.store') }}" method="POST" class="bg-white p-5 rounded-xl shadow-xl">
        @csrf
        <div class="mb-6">
            <label for="rut" class="block mb-2 text-sm font-medium text-gray-900">RUT</label>
            <input type="text" id="id" name="id" class='bg-gray-100 border-orange-400 text-sm rounded-lg block w-full p-2.5 @error('id')bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 @enderror' placeholder="12.345.678-9">
            @error('id')<p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{ $message }}</p>@enderror
        </div>
        <div class="flex flex-row gap-5 mb-6">
            <div class="w-full">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Nombre</label>
                <input type="text" id="name" name="name" class='bg-gray-100 border-orange-400 text-sm rounded-lg block w-full p-2.5 @error('id')bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 @enderror' placeholder="Juan">
                @error('name')<p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{ $message }}</p>@enderror
            </div>
            <div class="w-full">
                <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900">Apellido</label>
                <input type="text" id="last_name" name="last_name" class='bg-gray-100 border-orange-400 text-sm rounded-lg block w-full p-2.5 @error('id')bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 @enderror' placeholder="Perez">
                @error('last_name')<p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{ $message }}</p>@enderror
            </div>
        </div>
        <div class="mb-6">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
            <input type="email" id="email" name="email" class='bg-gray-100 border-orange-400 text-sm rounded-lg block w-full p-2.5 @error('id')bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 @enderror' placeholder="example@email.com">
            @error('email')<p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{ $message }}</p>@enderror
        </div>
        <div class="flex flex-row gap-5 mb-6">
            <div class="w-full">
                <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Contraseña</label>
                <input type="password" id="password" name="password" class='bg-gray-100 border-orange-400 text-sm rounded-lg block w-full p-2.5 @error('id')bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 @enderror' placeholder="•••••••••">
                @error('password')<p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{ $message }}</p>@enderror
            </div>
            <div class="w-full">
                <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900">Repita la contraseña</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class='bg-gray-100 border-orange-400 text-sm rounded-lg block w-full p-2.5 @error('id')bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 @enderror' placeholder="•••••••••">
                @error('password_confirmation')<p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{ $message }}</p>@enderror
            </div>
        </div>
        <div class="mb-6 flex items-center">
            <input type="checkbox" name="admin" id="admin" class="mr-4">
            <label for="admin">Administrador</label>
        </div>
        <div class="mb-6 text-white flex justify-between gap-5">
            <button class="bg-orange-500 rounded-lg p-2.5 w-full" type="submit">Registrar</button>
            <a href="{{ route('worker') }}" class="bg-yellow-400 rounded-lg p-3 w-full text-center">Cancelar</a>
        </div>
    </form>
</div> 
@endsection