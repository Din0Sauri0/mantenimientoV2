@extends('layouts.app')
@section('title')
    Clientes
@endsection
@section('content')
<div class="p-5 flex flex-col gap-5">
    <div>
        <a href="{{ route('client.create') }}" class="bg-orange-500 p-2 text-white rounded-xl">Agregar</a>
    </div>
    <div class="flex flex-col gap-2 2xl:grid 2xl:grid-cols-4 xl:grid xl:grid-cols-4 lg:grid lg:grid-cols-3 md:grid md:grid-cols-3 sm:grid sm:grid-cols-2">
        @foreach ($clients as $client)
        <div class="bg-white rounded-xl shadow-xl p-2">
            <div class="flex flex-col justify-between">
                <div class="grid grid-cols-3 justify-center items-center mb-2">
                    <div>
                        <img class="h-20 w-20 rounded-full" src="{{ asset('img/malldelcentroconcepcion.png') }}" alt="">
                    </div>
                    <div class="col-span-2">
                        <h1 class="text-xl">{{ $client->company_name }}</h1>
                        <div class="text-sm">Direccion: {{ $client->address }}</div>
                        <div class="text-sm">Giro: {{ $client->giro }}</div>
                    </div>
                </div>
                <div class="p-2 w-full flex justify-end text-xl">
                    <a href="{{ route('client.show', $client->id) }}">ir ></a>
                </div>

            </div>
        </div>
        @endforeach
    </div>
    
</div>
    
@endsection
