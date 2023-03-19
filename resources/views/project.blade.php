@extends('layouts.app')
@section('title')
    Proyectos
@endsection
@section('content')

<div class="p-5">
    <div>
        <a href="{{ route('project.create') }}" class="bg-orange-500 p-2 text-white rounded-full">Agregar</a>
    </div>
    <div class="w-full grid grid-cols-3 gap-2">
        @foreach ($projects as $project)
        <div class="bg-white p-2 rounded-xl drop-shadow-xl grid grid-col mt-5 content-between">
            <div class="grid grid-cols-3 justify-center items-center mb-2">
                <div>
                    <img class="h-20 w-20 rounded-full" src="{{ asset('img/malldelcentroconcepcion.png') }}" alt="">
                </div>
                <div class="pl-2 col-span-2">
                    <h1>{{ $project->name }}</h1>
                </div>
            </div>
            <div class="text-clip max-w-xs overflow-y-scroll max-h-20">
                {{ $project->description }}
            </div>
            <div class="flex flex-row-reverse">
                <a href="{{ route('project.show', $project->id) }}" class="w-20 p-2 hover:bg-gray-200 flex justify-center items-center rounded-xl text-blue-800">Ir ></a>
            </div>
        </div>
        @endforeach
    </div>

</div>
@endsection