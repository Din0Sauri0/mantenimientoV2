@extends('layouts.app')
@section('scripts')
@vite(['resources/js/client_load.js'])
@endsection
@section('title')
    Crea un nuevo proyecto
@endsection
@section('content')
<div class="p-5 w-full flex gap-5 justify-center items-center">
    <form action="{{ route('project.store') }}" method="POST" class="bg-white p-5 rounded-xl shadow-xl">
        @csrf
        <div class="mb-6 flex flex-col">
            <label class="block mb-2 text-sm font-medium text-gray-900" for="name">Nombre del proyecto</label>
            <input value="{{ old('name') }}" type="text" name="name" class='bg-gray-100 border-orange-400 text-sm rounded-lg block w-full p-2.5 @error('namne')bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 @enderror'>
        </div>
        <div class="mb-6 flex flex-col">
            <label class="block mb-2 text-sm font-medium text-gray-900" for="description">Descripción del proyecto</label>
            <textarea name="description" id="description" cols="40" rows="5" class='bg-gray-100 border-orange-400 text-sm rounded-lg block w-full p-2.5 @error('description')bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 @enderror'>{{ old('description') }}</textarea>
        </div>
        <div class="mb-6 flex flex-col">
            <label class="block mb-2 text-sm font-medium text-gray-900" for="client">Cliente</label>
            <select name="client" id="client" class='bg-gray-100 border-orange-400 text-sm rounded-lg block w-full p-2.5 @error('client')bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 @enderror'>
                <option value="0" disabled selected>--seleccione una opción--</option>
                @foreach ($client as $value)
                    <option value="{{ $value->id }}">{{ $value->company_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-6 flex flex-col">
            <label class="block mb-2 text-sm font-medium text-gray-900" for="client_repre">Representante</label>
            <select name="client_repre" id="client_repre" class='bg-gray-100 border-orange-400 text-sm rounded-lg block w-full p-2.5 @error('client_repre')bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 @enderror'>
                <option value="0" disabled selected>--seleccione una opción--</option>
            </select>
        </div>
        <div class="mb-6 text-white flex justify-between gap-5">
            <button class="bg-orange-500 rounded-lg p-2.5 w-full" type="submit">Guardar</button>
            <a class="bg-yellow-400 rounded-lg p-3 w-full text-center" href="{{ route('project') }}">Cancelar</a>
        </div>
    </form>
</div>
@endsection