@extends('layouts.app')
@section('title')
    Crear un producto
@endsection
@section('content')

<div class="p-5 flex flex-col">
    <div>
        <a href="{{ route('product.create') }}" class="bg-orange-500 p-2 text-white rounded-xl">Agregar</a>
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
                <h1 class="text-sm">Modelo: {{ $product->id }}</h1>
                <h1 class="text-sm">P/N: {{ $product->part_number }}</h1>
                <h1 class="text-sm">Fecha de creacion: {{ $product->created_at }}</h1>
                <h1 class="text-sm">Descripción.</h1>
                <h1 class="text-sm">{!! nl2br($product->description) !!}</h1>
            </div>
            
            <div class="flex flex-row-reverse">
                <a href="{{ route('product.show', $product->id) }}" class="w-20 p-2 hover:bg-gray-200 flex justify-center items-center rounded-xl text-blue-800">Ir ></a>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection