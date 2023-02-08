@extends('layouts.app')
@section('title')
    
@endsection
@section('content')
<div class="p-5 flex flex-col gap-5">
    <div>
        <a href="{{ route('worker.create') }}" class="bg-orange-500 p-2 text-white rounded-xl">Agregar</a>
    </div>
    <div class="flex flex-col gap-2 2xl:grid 2xl:grid-cols-4 xl:grid xl:grid-cols-4 lg:grid lg:grid-cols-3 md:grid md:grid-cols-3 sm:grid sm:grid-cols-2">
        @foreach ($user_data as $user)
        <div class="bg-white rounded-xl shadow-xl p-2">
            <div class="flex flex-col justify-between">
                <div>
                    <h1 class="text-xl">{{ $user['name'] }} {{ $user['last_name'] }}</h1>
                    <div class="text-sm">Rut: {{ $user['id'] }}</div>
                </div>
            </div>
            <div class="p-2 w-full flex justify-end text-xl">
                <a href="#">ir ></a>
            </div>
        </div>
        @endforeach
    </div>
</div>    
@endsection