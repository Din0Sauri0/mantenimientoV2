@extends('layouts.app')
@section('title')
    
@endsection
@section('content')
<div class="p-5 w-full h-screen overflow-auto">
    <div class="w-full flex gap-5 justify-around items-center">
        <div class="h-[50%] flex items-center justify-center m-5">
            <img class="rounded-full border-4 border-white shadow-xl" src="{{ asset('img/malldelcentroconcepcion.png') }}" alt="">
        </div>
        <div class="bg-white rounded-xl shadow-xl p-5 flex flex-col gap-5">
            <div>
                <label for="company_name" class="text-gray-500">Empresa</label>
                <h1 class="text-2xl">{{ $client->company_name }}</h1>
            </div>
            <div>
                <label for="address" class="text-gray-500">Dirección</label>
                <h1 class="text-2xl">{{ $client->address }}</h1>
            </div>
            <div>
                <label for="giro" class="text-gray-500">Giro</label>
                <h1 class="text-2xl">{{ $client->giro }}</h1>
            </div>
            <div class="text-white flex flex-row gap-3 text-center mt-5">
                <button class="bg-red-500 rounded-xl w-full p-3">Eliminar</button>
                <a class="bg-yellow-300 rounded-xl w-full p-3" href="#">Modificar</a>
            </div>
        </div>
    </div>
    
    <div class="flex flex-col">
        <button class="w-5 h-5 rounded-full p-5 flex justify-center items-center mb-3 bg-white shadow-xl" data-modal-target="representative_client" data-modal-toggle="representative_client">+</button>
        <div class=" bg-green-500 relative overflow-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Nº
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nombre
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Telefono
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Correo electronico
                        </th>

                    </tr>
                </thead>
                <tbody>
                    {{-- @foreach ($items as $key=>$value)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $key+1 }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $value->serial_number }}
                        </td>
                        <td class="px-6 py-4">
                            <div class="@if ($value->state == 0) bg-red-400 w-24 @else bg-green-400 w-20 @endif  rounded-full p-1 text-white  text-center">@if ($value->state == 0) No instalado @else Instalado @endif</div>
                        </td>
                    </tr>
                    @endforeach --}}
                </tbody>
            </table>
        </div>
    </div>
</div>

<div id="representative_client" tabindex="-1" aria-hidden="true"
    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
    <div class="relative w-full h-full max-w-md md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button"
                class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                data-modal-hide="representative_client">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="px-6 py-6 lg:px-8">
                <form class="space-y-6" action="{{ route('client_representative.store') }}" method="POST">
                    @csrf
                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Nombre</label>
                        <input type="text" id="name" name="name" class='bg-gray-100 border-orange-400 text-sm rounded-lg block w-full p-2.5 @error('name')bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 @enderror'>
                        @error('name')<p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900">Apellido</label>
                        <input type="text" id="last_name" name="last_name" class='bg-gray-100 border-orange-400 text-sm rounded-lg block w-full p-2.5 @error('last_name')bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 @enderror'>
                        @error('last_name')<p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label for="phone" class="block mb-2 text-sm font-medium text-gray-900">Telefono</label>
                        <input type="tel" name="phone" id="phone" class='bg-gray-100 border-orange-400 text-sm rounded-lg block w-full p-2.5 @error('phone')bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 @enderror'>
                        @error('phone')<p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                        <input type="email" id="email" name="email" class='bg-gray-100 border-orange-400 text-sm rounded-lg block w-full p-2.5 @error('email')bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 @enderror'>
                        @error('email')<p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{ $message }}</p>@enderror
                    </div>
                    <div class="flex gap-2 text-white">
                        <button class="bg-orange-500 rounded-lg p-2.5 w-full" type="submit">Guardar</button>
                        <button class="bg-yellow-400 rounded-lg p-2.5 w-full" type="reset">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection