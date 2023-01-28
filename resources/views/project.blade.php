@extends('layouts.app')
@section('title')
    Proyectos
@endsection
@section('content')
<div class="p-5">
    <div>
        <a href="#" class="bg-orange-500 hover:bg-orange-600 p-2 rounded-xl text-white flex justify-center">Agregar</a>
    </div>
    <div class="bg-white p-2 rounded-xl drop-shadow-xl flex flex-col mt-5">
        <div class="grid grid-cols-3 justify-center items-center mb-2">
            <div>
                <img class="h-20 w-20 rounded-full" src="{{ asset('img/malldelcentroconcepcion.png') }}" alt="">
            </div>
            <div class="col-span-2">
                <h1>[--Nombre del proyecto--]</h1>
            </div>
        </div>
        <div class="text-clip max-w-xs overflow-y-scroll max-h-20">
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus itaque recusandae adipisci reiciendis architecto quis quasi nihil omnis praesentium! Explicabo voluptatibus ratione consequatur earum laboriosam esse eum odit quasi vero.
        </div>
        <div class="flex flex-row-reverse">
            <a class="w-20 p-2 hover:bg-gray-200 flex justify-center items-center rounded-xl text-blue-800">Ir ></a>
        </div>
    </div>
</div>
@endsection