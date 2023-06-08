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
                    <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">{{ $worker_data['name'] }} {{ $worker_data['last_name'] }}</h3>
                    <form class="space-y-6" wire:click.prevent>
                        @csrf
                        <div>
                            <label for="id" class="block mb-2 text-sm font-medium text-gray-500">Rut</label>
                            <input wire:model="rut" class='bg-gray-100 border-orange-400 text-sm rounded-lg block w-full p-2.5 @error('id')bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 @enderror' type="text" name="id" id="id">
                            @error('id')<p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{ $message }}</p>@enderror
                        </div>
                        <div>
                            <label for="id" class="block mb-2 text-sm font-medium text-gray-500">Nombre</label>
                            <input wire:model="name" class='bg-gray-100 border-orange-400 text-sm rounded-lg block w-full p-2.5 @error('name')bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 @enderror' type="text" name="name" id="name">
                            @error('name')<p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{ $message }}</p>@enderror
                        </div>
                        <div>
                            <label for="last_name" class="block mb-2 text-sm font-medium text-gray-500">Apellido</label>
                            <input wire:model="last_name" class='bg-gray-100 border-orange-400 text-sm rounded-lg block w-full p-2.5 @error('last_name')bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 @enderror' type="text" name="last_name" id="last_name">
                            @error('last_name')<p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{ $message }}</p>@enderror
                        </div>
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-500">Correo electrónico</label>
                            <input wire:model="email" class='bg-gray-100 border-orange-400 text-sm rounded-lg block w-full p-2.5 @error('email')bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 @enderror' type="text" name="email" id="email">
                            @error('email')<p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{ $message }}</p>@enderror
                        </div>
                        <div class=" text-white flex justify-between">
                            <button wire:click="update" class="bg-red-400 hover:bg-red-600 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 w-full" type="submit">Aceptar</button>
                            <button data-modal-hide="update-modal" class="bg-yellow-400 hover:bg-yellow-600 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 w-full" type="reset">Cancelar</button>
                        </div>
    
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
