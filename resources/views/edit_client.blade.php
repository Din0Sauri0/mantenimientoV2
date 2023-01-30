@extends('layouts.app')
@section('title')
    
@endsection
@section('content')
<div class="p-5 w-full grid grid-cols-2 gap-5 justify-center items-center">
    <form action="#" class="h-[50%] w-full flex justify-center bg-white border-dashed border-2 border-gray-500 mb-2">
        <div id="dropzone">
            <h1>dropzone here</h1>
        </div>
    </form>
    <form action="{{ route('client.update', $client->id) }}" method="POST" class="bg-white p-5 rounded-xl shadow-xl">
        @csrf
        @method('PATCH')
        <div id="institution_information">
            <h1 class="text-xl">Datos de la institucion</h1>
            <div class="mb-2">
                <input value="{{ $client->company_name }}" class="class='border-none ring-2 ring-orange-100 hover:ring-orange-400 focus:ring-2 focus:ring-orange-400 h-9 w-full bg-gray-100 rounded-xl" type="text" name="company_name" id="company_name" placeholder="Nombre o razon social">
            </div>
            <div class="mb-2">
                <input value="{{ $client->address }}" class="class='border-none ring-2 ring-orange-100 hover:ring-orange-400 focus:ring-2 focus:ring-orange-400 h-9 w-full  bg-gray-100 rounded-xl" type="text" name="address" id="address" placeholder="Direccion">
            </div>
            <div class="mb-2">
                <input value="{{ $client->giro }}" class="class='border-none ring-2 ring-orange-100 hover:ring-orange-400 focus:ring-2 focus:ring-orange-400 h-9 w-full  bg-gray-100 rounded-xl" type="text" name="giro" id="giro" placeholder="Giro">
            </div>
        </div>
        <div id="representative_information">
            <h1 class="text-xl">Datos del representante</h1>
            <div class="mb-2 flex flex-row gap-2">
                <input value="{{ $client->contact_name }}" class="class='border-none ring-2 ring-orange-100 hover:ring-orange-400 focus:ring-2 focus:ring-orange-400 h-9 w-full  bg-gray-100 rounded-xl" type="text" name="contact_name" id="contact_name" placeholder="Nombre">
                <input value="{{ $client->contact_last_name }}" class="class='border-none ring-2 ring-orange-100 hover:ring-orange-400 focus:ring-2 focus:ring-orange-400 h-9 w-full  bg-gray-100 rounded-xl" type="text" name="contact_last_name" id="contact_last_name" placeholder="Apellido">
            </div>
            <div class="mb-2">
                <input value="{{ $client->contact_number }}" class="class='border-none ring-2 ring-orange-100 hover:ring-orange-400 focus:ring-2 focus:ring-orange-400 h-9 w-full  bg-gray-100 rounded-xl" type="tel" name="contact_number" id="contact_number" placeholder="Numero de contacto">
            </div>
            <div class="mb-2">
                <input value="{{ $client->email }}" class="class='border-none ring-2 ring-orange-100 hover:ring-orange-400 focus:ring-2 focus:ring-orange-400 h-9 w-full  bg-gray-100 rounded-xl" type="email" name="email" id="email" placeholder="Email">
            </div>
        </div>
        <button class="bg-orange-500 hover:bg-orange-600 p-2 rounded-xl w-full text-white" type="submit">Actualizar</button>
    </form>
    
</div>
    
@endsection