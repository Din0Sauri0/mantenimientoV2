@extends('layouts.app')
@section('title')

@endsection
@section('content')
<div class="relative overflow-auto shadow-md sm:rounded-lg w-full p-5">
    @livewire('search-input', ['maintenance' => $maintenance])
</div>
@endsection