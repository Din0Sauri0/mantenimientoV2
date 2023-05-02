@extends('layouts.app')
@section('title')
{{ $product->brand }} - {{ $product->name }}
@endsection
@section('content')
<div class="p-5 w-full h-screen overflow-auto">
    @if(Session::has('unauthorized'))
        <div id="toast-warning" class="absolute top-1.5 right-1.5 flex items-center w-full max-w-xs p-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert">
            <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-orange-500 bg-orange-100 rounded-lg dark:bg-orange-700 dark:text-orange-200">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Warning icon</span>
            </div>
            <div class="ml-3 text-sm font-normal">{{ Session::get('unauthorized') }}</div>
            <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-warning" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
        </div>
        @endif
    
    <div class="w-full flex flex-col lg:flex-row gap-5 justify-around items-center">
        <div>
            <img class="rounded-full border-4 border-white shadow-xl"
                src="{{ asset('product').'/'.$product->img }}" alt="imagen_producto" >
        </div>
        <div class="bg-white rounded-xl shadow-xl p-5 flex flex-col gap-5 max-w-lg max-h-96">
            <div>
                <label class="text-gray-500">Marca.</label>
                <h1 class="text-2xl">{{ $product->brand }}</h1>
            </div>
            
            <div class="flex gap-5">
                <div>
                    <label class="text-gray-500">Nombre.</label>
                    <h1 class="text-2xl">{{ $product->name }}</h1>
                </div>
            </div>
            <div class="flex gap-5">
                <div>
                    <label class="text-gray-500">Modelo.</label>
                    <h1 class="text-2xl">{{ $product->model }}</h1>
                </div>
                <div>
                    <label class="text-gray-500">Numero de parte.</label>
                    <h1 class="text-2xl">{{ $product->part_number }}</h1>
                </div>
            </div>
            <div class="overflow-auto">
                <label class="text-gray-500" for="description">Descripción.</label>
                <h1 class="text-2xl">{!! nl2br($product->specification) !!}</h1>
            </div>
            <div class="text-white flex flex-row justify-between gap-3 text-center mt-5">
                <button data-modal-target="popup-modal-product-{{ $product->model }}" data-modal-toggle="popup-modal-product-{{ $product->model }}" class="bg-red-500 rounded-xl p-3 w-full">Eliminar</button>
                <button wire:click="update" data-modal-target="update-modal" data-modal-toggle="update-modal" class="bg-yellow-300 rounded-xl p-3 w-full" href="#">Modificar</button>
            </div>
        </div>
    </div>
    <div class="flex flex-col">
        <div class="flex justify-between mt-3">
            <button data-modal-target="item-register" data-modal-toggle="item-register" class="w-5 h-5 rounded-full p-5 flex justify-center items-center mb-3 bg-white shadow-xl text-gray-500">+</button>
            <div class="flex justify-center items-center gap-3">
                <div class="bg-green-400 rounded-full lg:w-auto h-7 w-7 p-3 flex justify-center items-center text-white">
                    <h3 class="hidden lg:block">Instalados:&nbsp;</h3><h4>{{ $product->items->whereNotNull('project_id')->count() }}</h4> 
                </div>
                <div class="bg-red-400 rounded-full lg:w-auto h-7 w-7 p-3 flex justify-center items-center text-white">
                    <h3 class="hidden lg:block">No instalados:&nbsp;</h3><h4>{{ $product->items->whereNull('project_id')->count() }}</h4>
                </div>
                <div class="bg-yellow-400 rounded-full lg:w-auto h-7 w-7 p-3 flex justify-center items-center text-white">
                    <h3 class="hidden lg:block">total:&nbsp;</h3><h4>{{ $product->items->count() }}</h4>
                </div>
            </div>
        </div>

        

        <div class="relative overflow-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Nº
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Numero de serie
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Estado
                        </th>
                        <th scope="col" class="px-6 py-3"></th>
                        <th scope="col" class="px-6 py-3"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($product->items as $key=>$value)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $key+1 }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $value->serial_number }}
                        </td>
                        <td class="px-6 py-4">
                            <div class="@if ($value->project_id != null) bg-green-400 w-20 @else bg-red-400 w-24 @endif  rounded-full p-1 text-white  text-center">@if ($value->project_id != null) Instalado @else No instalado @endif</div>
                        </td>
                        <td>
                            <button class="bg-yellow-300 p-1 rounded-lg" data-modal-target="item-update-{{ $value->id }}" data-modal-toggle="item-update-{{ $value->id }}">
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
                    <form action="{{ route('product_item.delete', $value->id) }}" method="POST">
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
                                            seguro de elimar este articulo?</h3>
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
                    @livewire('item-update', ['value' => $value])
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@livewire('item-create', ['product' => $product])

<form action="{{ route('product.delete', $product->model) }}" method="POST">
    @csrf
    @method('DELETE')
    <div id="popup-modal-product-{{ $product->model }}" tabindex="-1"
        class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
        <div class="relative w-full h-full max-w-md md:h-auto">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button"
                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                    data-modal-hide="popup-modal-product-{{ $product->model }}">
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
                        seguro de elimar este producto?</h3>
                    <button data-modal-hide="popup-modal-product-{{ $product->model }}"
                        type="submit"
                        class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                        Si, estoy seguro
                    </button>
                    <button id="cancel_btn"
                        data-modal-hide="popup-modal-product-{{ $product->model }}" type="reset"
                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No,
                        cancelar</button>
                </div>
            </div>
        </div>
    </div>
</form>

@livewire('product-update', ['product' => $product])


@endsection