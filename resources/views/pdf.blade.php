<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{--
    <link rel="stylesheet" type="text/css" public_path="{{ asset('css/report.css') }}" /> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>PDF</title>
</head>

<body>    
    <table class="table table-sm">
        <thead>
            <tr>
                <th scope="col">Numero de serie</th>
                <th scope="col">Estado</th>
                <th scope="col">Modelo</th>
                <th scope="col">Ubicación</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($maintenance->items as $item)
            <tr>
                <td>{{ $item->serial_number }}</td>
                <td>
                    @foreach ($itemMaintenance as $itemmaintenance)
                    @if($itemmaintenance->item_id == $item->id and $itemmaintenance->state == 1)
                    <span class="badge badge-success">Listo</span>
                    @elseif($itemmaintenance->item_id == $item->id and $itemmaintenance->state == 0)
                    <span class="badge badge-danger">No listo</span>
                    @endif
                    @endforeach
                </td>
                <td>{{ $item->model }}</td>
                <td>{{ $item->location }}</td>
            </tr>
            @endforeach

        </tbody>
    </table>
    {{-- <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th>Numero de serie</th>
                <th>Esta de la mantención</th>
                <th>Modelo</th>
                <th>Ubicacion</th>
            </tr>
        </thead>
        <tbody>
            <tr></tr>
            @foreach ($maintenance->items as $item)
            <tr>
                <td>{{ $item->serial_number }}</td>
                <td>OK</td>
                <td>{{ $item->model }}</td>
                <td>{{ $item->location }}</td>
            </tr>

            @endforeach
            {{-- @foreach ($maintenance as $key=>$item)
            <tr>

            </tr>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <td class="px-6 py-4">
                    @foreach ($itemMaintenance as $itemmaintenance)
                    @if($itemmaintenance->item_id == $item->id and $itemmaintenance->state == 1)
                    <button>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6 text-green-400">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </button>
                    @elseif($itemmaintenance->item_id == $item->id and $itemmaintenance->state == 0)
                    <button data-modal-target="popup-modal-item-state-{{ $itemmaintenance->id }}"
                        data-modal-toggle="popup-modal-item-state-{{ $itemmaintenance->id }}">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6 text-red-400">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </button>
                    @endif
                    @livewire('item-state-update', ['maintenance_id' => $itemmaintenance->id])
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
            @endforeach --}}
        </tbody>
    </table>

</body>

</html>