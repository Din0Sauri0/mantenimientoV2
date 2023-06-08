@extends('layouts.app')
@section('title')

@endsection
@section('content')
<div class="p-5 w-full h-screen overflow-auto">
    <div class="w-full flex flex-col-reverse gap-2 lg:flex-row lg:justify-between mb-2">
        <div class="bg-white rounded-xl shadow-xl p-5 flex flex-col w-full lg:w-[50%] max-h-96">
            <div class="flex justify-between">
                <h1 class="text-xl">Mantenciones</h1>
                <button data-modal-target="create-maintenance" data-modal-toggle="create-maintenance">Agregar</button>
            </div>
            <div class="overflow-auto">
                @foreach ($project->maintenance as $maintenance)
                <div class="rounded-xl p-3 flex justify-between">
                    <a href="{{ route('maintenance.show', $maintenance->id) }}" class="hover:text-blue-500">{{$maintenance->start}}</a>
                    <p>{{ $maintenance->state }}%</p>
                </div>
                @endforeach
            </div>
        </div>
        <div class="bg-white rounded-xl shadow-xl p-5 flex flex-col gap-3 lg:max-w-lg w-auto">
            <div>
                <label class="text-gray-500 text-sm" for="name_project">Nombre del proyecto</label>
                <h1 class="text-lg" id="name_project">{{ $project->name }}</h1>
            </div>
            <div class="flex gap-5">
                <div>
                    <label class="text-gray-500 text-sm" for="client">Cliente</label>
                    <h1 class="text-lg" id="client">@if($project->client->company_name) {{ $project->client->company_name }} @else - @endif</h1>
                </div>
                <div>
                    <label class="text-gray-500 text-sm" for="giro">Giro</label>
                    <h1 class="text-lg" id="giro">{{ $project->client->giro }}</h1>
                </div>
            </div>
            <div class="flex gap-5">
                <div>
                    <label class="text-gray-500 text-sm" for="address">Dirección</label>
                    <h1 class="text-lg" id="address">{{ $project->client->address }}</h1>
                </div>
                <div>
                    <label class="text-gray-500 text-sm" for="agent">Representante</label>
                    <h1 class="text-lg" id="agent">{{ $project->agent->name }} {{ $project->agent->last_name }}</h1>
                </div>
            </div>

            <div class="overflow-auto">
                <label class="text-gray-500 text-sm" for="description">Descripción</label>
                <p class="text-md" id="description">{{ $project->description }}</p>
            </div>
            <div class="flex justify-between gap-2 text-white">
                <button data-modal-target="popup-modal-project-{{ $project->id }}" data-modal-toggle="popup-modal-project-{{ $project->id }}" class="bg-red-500 p-2 rounded-lg w-full">Eliminar</button>
                <button data-modal-target="update-modal" data-modal-toggle="update-modal" class="bg-yellow-300 p-2 rounded-lg w-full">Modificar</button>
            </div>
        </div>
    </div>
    <div class="flex flex-col">
        <button data-modal-target="products-modal" data-modal-toggle="products-modal"
            class="w-5 h-5 rounded-full p-5 flex justify-center items-center mb-3 bg-white shadow-xl text-gray-500">+</button>

        <div class="relative overflow-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Nº
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Número de serie
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Modelo
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Ubicación
                        </th>
                        <th scope="col" class="px-6 py-3"></th>
                        <th scope="col" class="px-6 py-3"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($project->items as $key=>$value)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $key+1 }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $value->serial_number }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $value->model }}
                        </td>
                        <td class="px-6 py-4">
                            @if ($value->location!=null)
                                {{ $value->location }}
                            @else
                                -
                            @endif
                        </td>
                        <td>
                            <button data-modal-target="popup-modal-item-location-{{ $value->id }}"
                                data-modal-toggle="popup-modal-item-location-{{ $value->id }}" class="bg-yellow-300 p-1 rounded-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-white">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                                </svg>
                            </button>
                        </td>
                        <td>
                            <button data-modal-target="popup-modal-item-{{ $value->id }}"
                                data-modal-toggle="popup-modal-item-{{ $value->id }}"
                                class="bg-red-500 p-1 rounded-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-white">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                </svg>
                            </button>
                        </td>
                    </tr>
                    <form action="{{ route('product_item.patch_delete', $value->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div id="popup-modal-item-{{ $value->id }}" tabindex="-1"
                            class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
                            <div class="relative w-full h-full max-w-md md:h-auto">
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <button type="button"
                                        class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                                        data-modal-hide="popup-modal-item-{{ $value->id }}">
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
                                            seguro de eliminar este articulo del proyecto?</h3>
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
                    <form action="{{ route('product_item.patch_location', $value->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div id="popup-modal-item-location-{{ $value->id }}" tabindex="-1"
                            class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
                            <div class="relative w-full h-full max-w-md md:h-auto">
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <button type="button"
                                        class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                                        data-modal-hide="popup-modal-item-location-{{ $value->id }}">
                                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                    <div class="p-6 text-gray-500 flex flex-col">
                                        <label for="location">Ubicación</label>
                                        <input type="text" name="location" class='bg-gray-100 border-orange-400 text-sm rounded-lg block w-full p-2.5 @error('location')bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 @enderror'>
                                    </div>
                                    <div class="flex justify-between gap-2 text-white p-5">
                                        <button class="bg-orange-400 p-2 rounded-lg w-full" type="submit">Aceptar</button>
                                        <button data-modal-hide="popup-modal-item-location-{{ $value->id }}" class="bg-yellow-300 p-2 rounded-lg w-full" type="reset">Cancelar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


{{-- Modales --}}
<div id="products-modal" tabindex="-1" aria-hidden="true"
    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
    <div class="relative w-full h-full max-w-md md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button"
                class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                data-modal-hide="products-modal">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <!-- Modal header -->
            <div class="px-6 py-4 border-b rounded-t dark:border-gray-600">
                <h3 class="text-base font-semibold text-gray-900 lg:text-xl dark:text-white">
                    Seleccione los dispositivos para el proyecto
                </h3>
            </div>
            <!-- Modal body -->
            <div class="p-6 overflow-auto h-96">
                <form action="{{ route('product_item.patch', $project->id) }}" method="post">
                    @csrf
                    @method('PATCH')
                    @foreach ($items as $item)
                    @if (!$item->project_id && $item->model != null)
                    <div class="flex justify-between content-center items-center">
                        <div class="flex gap-3">
                            <div>
                                <label class="text-gray-500 text-sm" for="model">Modelo</label>
                                <h5 class="text-md">{{ $item->model }}</h5>
                            </div>
                            <div>
                                <label class="text-gray-500 text-sm" for="serial_number">Número de serie</label>
                                <h5 class="text-md">{{ $item->serial_number }}</h5>
                            </div>
                        </div>
                        <div>
                            <input class="self-center" type="checkbox" name="items[]" value="{{ $item->id }}">
                        </div>
                    </div>
                    @endif
                    
                    @endforeach
            </div>
            <div class="flex justify-between p-3 gap-2 text-white">
                <button class="bg-orange-500 p-3 w-full rounded-lg" type="submit">Agregar</button>
                <button data-modal-hide="products-modal" class="bg-yellow-300 p-3 w-full rounded-lg" type="reset">Cancelar</button>
            </div>
            </form>
        </div>
    </div>
</div>

<form action="{{ route('project.delete', $project->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <div id="popup-modal-project-{{ $project->id }}" tabindex="-1"
        class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
        <div class="relative w-full h-full max-w-md md:h-auto">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button"
                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                    data-modal-hide="popup-modal-project-{{ $project->id }}">
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
                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Esta
                        seguro de eliminar este proyecto?</h3>
                    <button data-modal-hide="popup-modal-project-{{ $project->id }}"
                        type="submit"
                        class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                        Si, estoy seguro
                    </button>
                    <button
                        data-modal-hide="popup-modal-project-{{ $project->id }}"
                        type="reset"
                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No,
                        cancelar</button>
                </div>
            </div>
        </div>
    </div>
</form>

@livewire('project-update', ['project' => $project])
@livewire('maintenance-create', ['project' => $project])

@endsection