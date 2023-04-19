<div>
    <div class="flex w-full lg:w-[30%] gap-3 items-center mb-2">
        <input class='bg-gray-100 border-orange-400 text-sm rounded-lg block w-full lg:w-[80%] p-2.5' type="text" wire:model="search" placeholder="Search...">
        <button class="bg-white rounded-full p-1 h-min shadow-xl">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-gray-400">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
            </svg>     
        </button>
    </div>
    


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
            @foreach ($results as $key=>$item)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $key+1 }}
                </th>
                <td class="px-6 py-4">
                    @livewire('maintenance-checkbox', ['maintenance_id' => $maintenance->id, 'item_id' => $item->id])
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

    {{-- <ul>
        @foreach($results as $result)
            <li>{{ $result }}</li>
        @endforeach
    </ul> --}}
</div>
