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
            <input type="text" name="name" class='bg-gray-100 border-orange-400 text-sm rounded-lg block w-full p-2.5 @error('namne')bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 @enderror'>
        </div>
        <div class="mb-6 flex flex-col">
            <label class="block mb-2 text-sm font-medium text-gray-900" for="description">Descripcion del proyeto</label>
            <textarea name="description" id="description" cols="40" rows="5" class='bg-gray-100 border-orange-400 text-sm rounded-lg block w-full p-2.5 @error('description')bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 @enderror'></textarea>
        </div>
        <div class="mb-6 flex flex-col">
            <label class="block mb-2 text-sm font-medium text-gray-900" for="client">Cliente</label>
            <select name="client" id="client" class='bg-gray-100 border-orange-400 text-sm rounded-lg block w-full p-2.5 @error('client')bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 @enderror'>
                <option value="0" disabled selected>--seleccione una opcion--</option>
                @foreach ($client as $value)
                    <option value="{{ $value->id }}">{{ $value->company_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-6 flex flex-col">
            <label class="block mb-2 text-sm font-medium text-gray-900" for="client_repre">Representante</label>
            <select name="client_repre" id="client_repre" class='bg-gray-100 border-orange-400 text-sm rounded-lg block w-full p-2.5 @error('client_repre')bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 @enderror'>
            </select>
        </div>
        <div>
            <button type="submit">Guardar</button>
            <a href="#">Cancelar</a>
        </div>
    </form>
</div>
@endsection