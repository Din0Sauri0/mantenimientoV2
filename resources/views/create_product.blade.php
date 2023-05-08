@extends('layouts.app')
@section('title')
    Equipamiento
@endsection
@push('styles')
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush
@section('content')
<div class="p-5 flex flex-col lg:flex-row gap-5 w-full justify-center items-center">
    <form action="{{ route('image.product') }}" id="dropzone" method="POST" enctype="multipart/form-data" id="dropzone" class="dropzone order-dashed border-2 w-full h-96 rounded flex flex-col justify-center items-center lg:h-[50%] lg:w-[50%]">
        @csrf
    </form>

    <form action="#" method="POST" class="bg-white p-5 rounded-xl shadow-xl">
        @csrf
        <div class="mb-6 flex flex-col">
            <label for="brand" class="block mb-2 text-sm font-medium text-gray-900">Marca</label>
            <input value="{{ old('brand') }}" type="text" id="brand" name="brand" placeholder="Hikvision" class='bg-gray-100 border-orange-400 text-sm rounded-lg block w-full p-2.5 @error('brand')bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 @enderror'>
            @error('brand')<p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{ $message }}</p>@enderror
        </div>
        <div class="mb-6 flex flex-col">
            <label for="product_name" class="block mb-2 text-sm font-medium text-gray-900">Nombre del producto</label>
            <input value="{{ old('product_name') }}" type="text" id="product_name" name="product_name" placeholder="Detector" class='bg-gray-100 border-orange-400 text-sm rounded-lg block w-full p-2.5 @error('product_name')bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 @enderror'>
            @error('product_name')<p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{ $message }}</p>@enderror
        </div>
        <div class="mb-6 flex flex-row gap-5">
            <div>
                <label for="model" class="block mb-2 text-sm font-medium text-gray-900">Modelo</label>
                <input value="{{ old('model') }}" type="text" id="model" name="model" placeholder="HD-HAC-B1A13P" class='bg-gray-100 border-orange-400 text-sm rounded-lg block w-full p-2.5 @error('model')bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 @enderror'>
                @error('model')<p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{ $message }}</p>@enderror
            </div>
            <div>
                <label for="part_number" class="block mb-2 text-sm font-medium text-gray-900">Numero de parte</label>
                <input value="{{ old('part_number') }}" type="text" id="part_number" name="part_number" placeholder="1.0.01.13.133245-001" class='bg-gray-100 border-orange-400 text-sm rounded-lg block w-full p-2.5 @error('part_number')bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 @enderror'>
                @error('part_number')<p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{ $message }}</p>@enderror
            </div>
        </div>
        <div class="mb-6">
            <label for="characteristics" class="block mb-2 text-sm font-medium text-gray-900">Características</label>
            <textarea id="characteristics" name="characteristics" rows="8" placeholder="Escribe las características de equipo aqui..." class='bg-gray-100 border-orange-400 text-sm rounded-lg block w-full p-2.5 @error('characteristics')bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 @enderror'>{{ old('characteristics') }}</textarea>
            @error('characteristics')<p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{ $message }}</p>@enderror
        </div>
        <div class="mb-2">
            <input name="img" type="hidden" value="{{ old('img') }}">
            @error('img') <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{ $message }}</p> @enderror
        </div>
        <div class="mb-6 text-white flex justify-between gap-5">
            <button class="bg-orange-500 rounded-lg p-2.5 w-full" type="submit">Registrar</button>
            <a href="{{ route('product') }}" class="bg-yellow-400 rounded-lg p-3 w-full text-center">Cancelar</a>
        </div>
    </form>
</div>
@endsection