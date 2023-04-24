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
                            @if($item->state)
                                <button>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-green-400">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                      
                                </button>
                            @else
                                <button class="">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-red-400">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>    
                                </button>    
                            @endif
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
                            @if($item->state)
                                <button>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-green-400">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                      
                                </button>
                            @else
                                <button class="">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-red-400">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>    
                                </button>    
                            @endif
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