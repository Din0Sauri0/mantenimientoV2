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
            @if (is_object($result))
                @foreach ($result as $key=>$item)
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
            @else
                @foreach ($result as $key=>$item)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $key+1 }}
                        </th>
                        <td class="px-6 py-4">
                            @livewire('maintenance-checkbox', ['maintenance_id' => $maintenance->id, 'item_id' => $item['id']])
                        </td>
                        <td class="px-6 py-4">
                            {{ $item['serial_number'] }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $item['model'] }}
                        </td>
                        <td class="px-6 py-4">
                            @if ($item['location']!=null)
                            {{ $item['location'] }}
                            @else
                            -
                            @endif
                        </td>
                    </tr>
                @endforeach
            @endif
            
        </tbody>
    </table>
</div>