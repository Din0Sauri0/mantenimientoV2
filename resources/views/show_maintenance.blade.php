@extends('layouts.app')
@section('title')

@endsection
@section('content')
<div class="relative overflow-auto shadow-md sm:rounded-lg w-full p-5">
    <a class="p-2 bg-green-400 text-white rounded-xl" href="{{ route('reporte.pdf', $maintenance->id) }}">PDF</a>
    @livewire('search-input', ['maintenance' => $maintenance])
    
</div>
@endsection