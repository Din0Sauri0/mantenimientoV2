@extends('layouts.app')
@section('title')
    Crear un producto
@endsection
@section('content')

@if ($products->isEmpty())
<div class="p-5 grid h-[10%] w-full justify-center">
    <div class="flex flex-col justify-items-center max-w-xl p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
        <h5 class="text-center mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
            No se han encontrado productos registrados.
        </h5>
        <a href="{{ route('product.create') }}" class="font-normal text-gray-700 dark:text-gray-400 text-center hover:text-blue-500 hover:underline">Pincha aqui para agregar un nuevo!</a>
    </div>
</div>
@else
<div class="p-5 flex flex-col">
    <div class="flex justify-between content-center">
        <div>
            <a href="{{ route('product.create') }}" class="text-white bg-orange-400 hover:bg-orange-600 focus:ring-4 focus:ring-orange-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">Agregar</a>
        </div>
        @if (Session::has('msg'))
        <div id="toast-success" class="flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert">
            <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Check icon</span>
            </div>
            <div class="ml-3 text-sm font-normal">{{ Session::get('msg') }}</div>
            <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-success" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
        </div>
        @endif
    </div>
    <div class="w-full grid grid-cols-4 gap-5">
        @foreach ($products as $product)
        <div class="bg-white p-2 rounded-xl drop-shadow-xl flex flex-col mt-5">
            <div class="grid grid-cols-3 justify-center items-center mb-2">
                <div>
                    <img class="h-20 w-20 rounded-full" src="{{ asset('img/malldelcentroconcepcion.png') }}" alt="">
                </div>
                <div class="ml-3 col-span-2">
                    <h1 class="text-xl">{{ $product->name }}</h1>
                </div>
            </div>
            <div class="text-clip max-w-xs overflow-y-scroll max-h-20">
                <h1 class="text-sm">Modelo: {{ $product->model }}</h1>
                <h1 class="text-sm">P/N: {{ $product->part_number }}</h1>
                <h1 class="text-sm">Fecha de creacion: {{ $product->created_at }}</h1>
                <h1 class="text-sm">Descripción.</h1>
                <h1 class="text-sm">{!! nl2br($product->description) !!}</h1>
            </div>
            
            <div class="flex flex-row-reverse">
                <a href="{{ route('product.show', $product->model) }}" class="w-20 p-2 hover:bg-gray-200 flex justify-center items-center rounded-xl text-blue-800">Ir ></a>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endif

@endsection