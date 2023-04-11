@extends('layouts.app')
@section('scripts')
@vite(['resources/js/delete_backdrop.js'])
@endsection
@section('title')
{{ $client->company_name }}
@endsection
@section('content')
<div class="p-5 w-full h-screen overflow-auto">
    <div class="w-full flex gap-5 justify-around items-center">
        <div class="h-[50%] flex items-center justify-center m-5">
            <img class="rounded-full border-4 border-white shadow-xl"
                src="{{ asset('img/malldelcentroconcepcion.png') }}" alt="">
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
                <button id="delete_father" data-modal-target="popup-modal-delete-client" data-modal-toggle="popup-modal-delete-client"
                    class="bg-red-500 rounded-xl w-full p-3">Eliminar</button>
                <button data-modal-target="update-modal" data-modal-toggle="update-modal" class="bg-yellow-300 rounded-xl w-full p-3">Modificar</button>
            </div>
        </div>
    </div>

    <button class="w-5 h-5 rounded-full p-5 flex justify-center items-center mb-3 bg-white shadow-xl" data-modal-target="representative_client" data-modal-toggle="representative_client">+</button>

    <div class="w-full flex justify-center">
        @if ($client->agents->isEmpty())

        <div class="flex flex-col justify-items-center max-w-xl p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
            <h5 class="text-center mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                No se han encontrado representantes, prueba agregando uno nuevo
            </h5>
            <button data-modal-target="representative_client" data-modal-toggle="representative_client" class="font-normal text-gray-700 dark:text-gray-400 text-center hover:text-blue-500 hover:underline">Pincha aqui para agregar un nuevo!</button>
        </div>

        @else
        <div class="relative overflow-auto shadow-md sm:rounded-lg w-full">

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
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($client->agents as $key=>$value)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $key+1 }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $value->name }} {{ $value->last_name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $value->number }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $value->email }}
                        </td>
                        <td>
                            <button data-modal-target="representative_client-update" data-modal-toggle="representative_client-update" class="bg-yellow-300 p-1 rounded-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-white">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                                </svg>
                            </button>
                        </td>
                        <td>
                            <button data-modal-target="popup-modal-representative-{{ $value->id }}"
                                data-modal-toggle="popup-modal-representative-{{ $value->id }}"
                                class="bg-red-500 p-1 rounded-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-white">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                </svg>
                            </button>
                        </td>
                    </tr>
                    <form action="{{ route('client_representative.delete', $value->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <div id="popup-modal-representative-{{ $value->id }}" tabindex="-1"
                            class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
                            <div class="relative w-full h-full max-w-md md:h-auto">
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <button type="button"
                                        class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                                        data-modal-hide="popup-modal-representative-{{ $value->id }}">
                                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                    <div class="p-6 text-center">
                                        <svg aria-hidden="true"
                                            class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Estas
                                            seguro de elimar a {{ $value->name }} {{ $value->last_name }}?</h3>
                                        <button data-modal-hide="popup-modal-representative-{{ $value->id }}"
                                            type="submit"
                                            class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                            Si, estoy seguro
                                        </button>
                                        <button id="cancel_btn"
                                            data-modal-hide="popup-modal-representative-{{ $value->id }}" type="reset"
                                            class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No,
                                            cancelar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    @livewire('agent-update', ['value' => $value])
                    @endforeach
                </tbody>
            </table>

        </div>
        @endif
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
                    <input type="hidden" value="{{ $client->id }}" name="client_id">
                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Nombre</label>
                        <input type="text" id="name" name="name"
                            class='bg-gray-100 border-orange-400 text-sm rounded-lg block w-full p-2.5 @error('
                            name')bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500
                            focus:border-red-500 @enderror'>
                        @error('name')<p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                class="font-medium">Oops!</span> {{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900">Apellido</label>
                        <input type="text" id="last_name" name="last_name"
                            class='bg-gray-100 border-orange-400 text-sm rounded-lg block w-full p-2.5 @error('
                            last_name')bg-red-50 border border-red-500 text-red-900 placeholder-red-700
                            focus:ring-red-500 focus:border-red-500 @enderror'>
                        @error('last_name')<p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                class="font-medium">Oops!</span> {{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label for="phone" class="block mb-2 text-sm font-medium text-gray-900">Telefono</label>
                        <input type="tel" name="phone" id="phone"
                            class='bg-gray-100 border-orange-400 text-sm rounded-lg block w-full p-2.5 @error('
                            phone')bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500
                            focus:border-red-500 @enderror'>
                        @error('phone')<p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                class="font-medium">Oops!</span> {{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                        <input type="email" id="email" name="email"
                            class='bg-gray-100 border-orange-400 text-sm rounded-lg block w-full p-2.5 @error('
                            email')bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500
                            focus:border-red-500 @enderror'>
                        @error('email')<p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                class="font-medium">Oops!</span> {{ $message }}</p>@enderror
                    </div>
                    <div class="flex gap-2 text-white">
                        <button class="bg-orange-500 rounded-lg p-2.5 w-full" type="submit">Guardar</button>
                        <button data-modal-hide="representative_client" class="bg-yellow-400 rounded-lg p-2.5 w-full"
                            type="reset">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<form action="{{ route('client.delete', $client->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <div id="popup-modal-delete-client" tabindex="-1"
        class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
        <div class="relative w-full h-full max-w-md md:h-auto">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button"
                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                    data-modal-hide="popup-modal-delete-client">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="p-6 text-center">
                    <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Estas seguro de elimar a {{
                        $client->company_name }}?</h3>
                    <button data-modal-hide="popup-modal-delete-client" type="submit"
                        class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                        Si, estoy seguro
                    </button>
                    <button id="cancel_btn" data-modal-hide="popup-modal-delete-client" type="reset"
                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No,
                        cancelar</button>
                </div>
            </div>
        </div>
    </div>
</form>

@livewire('client-update', ['client' => $client])


@endsection