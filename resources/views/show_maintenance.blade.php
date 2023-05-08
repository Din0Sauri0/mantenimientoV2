@extends('layouts.app')
@section('title')

@endsection
@section('content')
<div class="relative overflow-auto shadow-md sm:rounded-lg w-full p-5">
    {{-- <a class="p-2 bg-green-400 text-white rounded-xl" href="{{ route('reporte.pdf', $maintenance->id) }}">PDF</a> --}}
    @livewire('search-input', ['maintenance' => $maintenance])
    <div class="relative overflow-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Nº
                    </th>
                    <th scope="col" class="px-6 py-3">
                        estado
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Numero de serie
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