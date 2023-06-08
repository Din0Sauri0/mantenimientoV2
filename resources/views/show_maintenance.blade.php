@extends('layouts.app')
@section('title')

@endsection
@section('content')
<div class="relative overflow-auto shadow-md sm:rounded-lg w-full p-5">
    <div class=" flex gap-2 lg:flex-row-reverse md:flex-row-reverse sm:flex-row-reverse flex-row-reverse justify-between items-center mb-5">
        <div class="bg-white rounded-full shadow-xl p-3">
            <a href="{{ route('reporte.pdf', $maintenance->id) }}">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.72 13.829c-.24.03-.48.062-.72.096m.72-.096a42.415 42.415 0 0110.56 0m-10.56 0L6.34 18m10.94-4.171c.24.03.48.062.72.096m-.72-.096L17.66 18m0 0l.229 2.523a1.125 1.125 0 01-1.12 1.227H7.231c-.662 0-1.18-.568-1.12-1.227L6.34 18m11.318 0h1.091A2.25 2.25 0 0021 15.75V9.456c0-1.081-.768-2.015-1.837-2.175a48.055 48.055 0 00-1.913-.247M6.34 18H5.25A2.25 2.25 0 013 15.75V9.456c0-1.081.768-2.015 1.837-2.175a48.041 48.041 0 011.913-.247m10.5 0a48.536 48.536 0 00-10.5 0m10.5 0V3.375c0-.621-.504-1.125-1.125-1.125h-8.25c-.621 0-1.125.504-1.125 1.125v3.659M18 10.5h.008v.008H18V10.5zm-3 0h.008v.008H15V10.5z" />
                </svg>
            </a>
        </div>
        <div class="lg:w-[40%] md:w-[60%] sm:w-[80%] w-full">
            @livewire('search-input', ['maintenance' => $maintenance])
        </div>
    </div>
    
    <div class="relative overflow-auto sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Nº
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Estado
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
                </tr>
            </thead>
            <tbody>
                @foreach ($maintenance->items as $key=>$item)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $key+1 }}
                            </th>
                            <td class="px-6 py-4">
                                @foreach ($itemMaintenance as $itemmaintenance)
                                    @if($itemmaintenance->item_id == $item->id and $itemmaintenance->state == 1)
                                        <button>
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-green-400">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        </button>
                                    @elseif($itemmaintenance->item_id == $item->id and $itemmaintenance->state == 0)
                                        <button data-modal-target="popup-modal-item-state-{{ $itemmaintenance->id }}" data-modal-toggle="popup-modal-item-state-{{ $itemmaintenance->id }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-red-400">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>    
                                        </button>  
                                    @endif
                                    @livewire('item-state-update', ['maintenance_id' => $itemmaintenance->id, 'maintenance' => $maintenance])
                                @endforeach
                            </td>
                            <td class="px-6 py-4">
                                {{ $item->serial_number }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $item->model }}
                            </td>
                            <td class="px-6 py-4">
                                @if ($item->location!=null)
                                {{ $item->location }}
                                @else
                                -
                                @endif
                            </td>
                        </tr>
                    @endforeach
            </tbody>
        </table>
    </div>
    
</div>
@endsection