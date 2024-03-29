@extends('layouts.app')
@section('title')
    
@endsection
@section('content')
<div class="p-5 w-full sm:grid sm:grid-cols-2 sm:gap-5 justify-center items-center">
    <form action="#" class="sm:h-[50%] h-80 w-full flex justify-center bg-white border-dashed border-2 border-gray-500 mb-2">
        <div id="dropzone">
            <h1>dropzone here</h1>
        </div>
    </form>
    <form action="{{ route('client.update', $client->id) }}" method="POST" class="bg-white p-5 rounded-xl shadow-xl">
        @csrf
        @method('PATCH')
        <div id="institution_information">
            <h1 class="text-xl">Datos de la institución</h1>
            <div class="mb-2">
                <input value="{{ $client->company_name }}" class='bg-gray-100 border-orange-400 text-sm rounded-lg block w-full p-2.5 @error('company_name')bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 @enderror' type="text" name="company_name" id="company_name" placeholder="Nombre o razon social">
                @error('company_name') <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{ $message }}</p> @enderror
            </div>
            <div class="mb-2">
                <input value="{{ $client->address }}" class='bg-gray-100 border-orange-400 text-sm rounded-lg block w-full p-2.5 @error('address')bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 @enderror' type="text" name="address" id="address" placeholder="Dirección">
                @error('address') <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{ $message }}</p> @enderror
            </div>
            <div class="mb-2">
                <input value="{{ $client->giro }}" class='bg-gray-100 border-orange-400 text-sm rounded-lg block w-full p-2.5 @error('giro')bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 @enderror' type="text" name="giro" id="giro" placeholder="Giro">
                @error('giro') <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{ $message }}</p> @enderror
            </div>
        </div>
        <div id="representative_information">
            <h1 class="text-xl">Datos del representante</h1>
            <div class="mb-2 flex flex-col gap-2">
                <input value="{{ $client->contact_name }}" class='bg-gray-100 border-orange-400 text-sm rounded-lg block w-full p-2.5 @error('contact_name')bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 @enderror' type="text" name="contact_name" id="contact_name" placeholder="Nombre">
                @error('contact_name') <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{ $message }}</p> @enderror
                <input value="{{ $client->contact_last_name }}" class='bg-gray-100 border-orange-400 text-sm rounded-lg block w-full p-2.5 @error('contact_last_name')bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 @enderror' type="text" name="contact_last_name" id="contact_last_name" placeholder="Apellido">
                @error('contact_last_name') <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{ $message }}</p> @enderror
            </div>
            <div class="mb-2">
                <input value="{{ $client->contact_number }}" class='bg-gray-100 border-orange-400 text-sm rounded-lg block w-full p-2.5 @error('contact_number')bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 @enderror' type="tel" name="contact_number" id="contact_number" placeholder="Número de contacto">
                @error('contact_number') <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{ $message }}</p> @enderror
            </div>
            <div class="mb-2">
                <input value="{{ $client->email }}" class='bg-gray-100 border-orange-400 text-sm rounded-lg block w-full p-2.5 @error('email')bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 @enderror' type="email" name="email" id="email" placeholder="Email">
                @error('email') <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{ $message }}</p> @enderror
            </div>
        </div>
        <button class="bg-orange-500 hover:bg-orange-600 p-2 rounded-xl w-full text-white" type="submit">Actualizar</button>
    </form>
    
</div>
    
@endsection