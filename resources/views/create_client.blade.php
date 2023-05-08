@extends('layouts.app')
@section('title')
    Cliente    
@endsection
@push('styles')
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush
@section('content')

<div class="p-5 w-full lg:grid lg:grid-cols-2 gap-5 lg:justify-center lg:items-center">
    <div>
        <form action="{{ route('image.client') }}" method="POST" enctype="multipart/form-data" id="dropzone" class="dropzone order-dashed border-2 w-full h-96 rounded flex flex-col justify-center items-center">
            @csrf
        </form>
        
    </div>
    
    <form action="{{ route('client.store') }}" method="POST" class="bg-white p-5 rounded-xl shadow-xl">
        @csrf
        <div id="institution_information">
            <h1 class="text-xl">Datos de la institucion</h1>
            <div class="mb-2">
                <input value="{{ old('company_name') }}" class='bg-gray-100 border-orange-400 text-sm rounded-lg block w-full p-2.5 @error('company_name')bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 @enderror' type="text" name="company_name" id="company_name" placeholder="Nombre o razon social">
                @error('company_name') <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{ $message }}</p> @enderror
            </div>
            <div class="mb-2">
                <input value="{{ old('address') }}" class='bg-gray-100 border-orange-400 text-sm rounded-lg block w-full p-2.5 @error('company_name')bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 @enderror' type="text" name="address" id="address" placeholder="Direccion">
                @error('address') <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{ $message }}</p> @enderror
            </div>
            <div class="mb-2">
                <input value="{{ old('giro') }}" class='bg-gray-100 border-orange-400 text-sm rounded-lg block w-full p-2.5 @error('company_name')bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 @enderror' type="text" name="giro" id="giro" placeholder="Giro">
                @error('giro') <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{ $message }}</p> @enderror
            </div>
            <div class="mb-2">
                <input name="img" type="hidden" value="{{ old('img') }}">
                @error('img') <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{ $message }}</p> @enderror
            </div>
        </div>
        <div id="representative_information">
        <div class="mb-6 text-white flex justify-between gap-5">
            <button class="bg-orange-500 hover:bg-orange-600 p-2 rounded-xl w-full text-white" type="submit">Registrar</button>
            <a href="{{ route('client') }}" class="bg-yellow-400 rounded-lg p-3 w-full text-center">Cancelar</a>
        </div>

        
    </form>
    
</div>
@endsection