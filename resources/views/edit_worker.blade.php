@extends('layouts.app')
@section('title')
    
@endsection
@section('content')
<div class="p-5 w-full grid grid-cols-2 gap-5 justify-center items-center">
    <form action="{{ route('worker.update', $worker_data['id']) }}" method="POST">
        @method('PATCH')
        @csrf
        <div class="mb-6">
            <label for="rut" class="block mb-2 text-sm font-medium text-gray-900">RUT</label>
            <input value="{{ $worker_data['id'] }}" type="text" id="id" name="id" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5" placeholder="12.345.678-9">
            @error('rut')<p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{ $message }}</p>@enderror
        </div>
        <div class="flex flex-row gap-5 mb-6">
            <div class="w-full">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Nombre</label>
                <input value="{{ $worker_data['name'] }}" type="text" id="name" name="name" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5" placeholder="Juan">
                @error('name')<p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{ $message }}</p>@enderror            
            </div>
            <div class="w-full">
                <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900">Apellido</label>
                <input value="{{ $worker_data['last_name'] }}" type="text" id="last_name" name="last_name" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5" placeholder="Perez">
                @error('last_name')<p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{ $message }}</p>@enderror
            </div>
        </div>
        <div class="mb-6">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
            <input value="{{ $worker_data['email'] }}" type="email" id="email" name="email" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5" placeholder="example@email.com">
            @error('email')<p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{ $message }}</p>@enderror
        </div>
        {{-- <div class="flex flex-row gap-5 mb-6">
            <div class="w-full">
                <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Contraseña</label>
                <input type="password" id="password" name="password" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5" placeholder="•••••••••">
            </div>
            <div class="w-full">
                <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900">Repita la contraseña</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5" placeholder="•••••••••">
            </div>
        </div> --}}
        <div class="mb-6 flex items-center">
            <input type="checkbox" name="admin" id="admin" class="mr-4">
            <label for="admin">Administrador</label>
        </div>
        <div class="mb-6 text-white">
            <button class="bg-orange-500 rounded-lg p-2.5" type="submit">Actualizar</button>
        </div>
    </form>
</div> 
@endsection