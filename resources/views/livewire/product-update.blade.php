<div>
    <div id="update-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full" role="dialog" wire:ignore.self>
        <div class="relative w-full h-full max-w-md md:h-auto">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="update-modal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="p-6 lg:px-8">
                    <form wire:submit.prevent>
                        @csrf
                        <div class="mb-6 flex flex-col">
                            <label for="brand" class="block mb-2 text-sm font-medium text-gray-900">Marca</label>
                            <input wire:model="brand" type="text" id="brand" name="brand" placeholder="Hikvision" class='bg-gray-100 border-orange-400 text-sm rounded-lg block w-full p-2.5 @error('brand')bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 @enderror'>
                            @error('brand')<p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{ $message }}</p>@enderror
                        </div>
                        <div class="mb-6 flex flex-col">
                            <label for="product_name" class="block mb-2 text-sm font-medium text-gray-900">Nombre del producto</label>
                            <input wire:model="product_name" type="text" id="product_name" name="product_name" placeholder="Detector" class='bg-gray-100 border-orange-400 text-sm rounded-lg block w-full p-2.5 @error('product_name')bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 @enderror'>
                            @error('product_name')<p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{ $message }}</p>@enderror
                        </div>
                        <div class="mb-6 flex flex-row gap-5">
                            <div>
                                <label for="model" class="block mb-2 text-sm font-medium text-gray-900">Modelo</label>
                                <input wire:model="model" type="text" id="model" name="model" placeholder="HD-HAC-B1A13P" class='bg-gray-100 border-orange-400 text-sm rounded-lg block w-full p-2.5 @error('model')bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 @enderror'>
                                @error('model')<p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{ $message }}</p>@enderror
                            </div>
                            <div>
                                <label for="part_number" class="block mb-2 text-sm font-medium text-gray-900">Numero de parte</label>
                                <input wire:model="part_number" type="text" id="part_number" name="part_number" placeholder="1.0.01.13.133245-001" class='bg-gray-100 border-orange-400 text-sm rounded-lg block w-full p-2.5 @error('part_number')bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 @enderror'>
                                @error('part_number')<p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{ $message }}</p>@enderror
                            </div>
                        </div>
                        <div class="mb-6">
                            <label for="characteristics" class="block mb-2 text-sm font-medium text-gray-900">Características</label>
                            <textarea wire:model="characteristics" id="characteristics" name="characteristics" rows="8" placeholder="Escribe las características de equipo aqui..." class='bg-gray-100 border-orange-400 text-sm rounded-lg block w-full p-2.5 @error('characteristics')bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 @enderror'></textarea>
                            @error('characteristics')<p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{ $message }}</p>@enderror
                        </div>
                        <div class="mb-6 text-white flex justify-between gap-5">
                            <button wire:click="update" class="bg-orange-500 rounded-lg p-2.5 w-full" type="submit">Registrar</button>
                            <button data-modal-hide="update-modal" class="bg-yellow-400 rounded-lg p-3 w-full text-center">Cancelar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

