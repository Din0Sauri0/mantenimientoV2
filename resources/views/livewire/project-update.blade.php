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
                    <form wire:click.prevent>
                        @csrf
                        <div class="mb-6 flex flex-col">
                            <label class="block mb-2 text-sm font-medium text-gray-900" for="name">Nombre del proyecto</label>
                            <input wire:model="name" type="text" name="name" class='bg-gray-100 border-orange-400 text-sm rounded-lg block w-full p-2.5 @error('namne')bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 @enderror'>
                            @error('name')<p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{ $message }}</p>@enderror
                        </div>
                        <div class="mb-6 flex flex-col">
                            <label class="block mb-2 text-sm font-medium text-gray-900" for="description">Descripcion del proyeto</label>
                            <textarea wire:model="description" name="description" id="description" cols="40" rows="5" class='bg-gray-100 border-orange-400 text-sm rounded-lg block w-full p-2.5 @error('description')bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 @enderror'></textarea>
                            @error('description')<p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{ $message }}</p>@enderror
                        </div>
                        <div class="mb-6 flex flex-col">
                            <label class="block mb-2 text-sm font-medium text-gray-900" for="client">Cliente</label>
                            <select wire:model="client" name="client" id="client" class='bg-gray-100 border-orange-400 text-sm rounded-lg block w-full p-2.5 @error('client')bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 @enderror'>
                                <option value="">--Seleccione un cliente--</option>
                                @foreach ($clients as $client)
                                    <option value="{{ $client->id }}">{{ $client->company_name }}</option>
                                @endforeach
                            </select>
                            @error('client')<p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{ $message }}</p>@enderror
                        </div>
                        <div class="mb-6 flex flex-col">
                            <label class="block mb-2 text-sm font-medium text-gray-900" for="client_repre">Representante</label>
                            <select wire:model="client_repre" name="client_repre" id="client_repre" class='bg-gray-100 border-orange-400 text-sm rounded-lg block w-full p-2.5 @error('client_repre')bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 @enderror'>
                                @foreach ($agents as $client_repre)
                                    <option value="{{ $client_repre->id }}">{{ $client_repre->name }}</option>
                                @endforeach
                            </select>
                            @error('client_repre')<p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{ $message }}</p>@enderror
                        </div>
                        <div class="flex justify-between">
                            <button wire:click="update" class="text-white bg-orange-400 hover:bg-orange-600 focus:ring-4 focus:ring-orange-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 w-full">Guardar</button>
                            <button data-modal-hide="update-modal" type="reset" class="text-white bg-red-400 hover:bg-red-600 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 w-full">Cancelar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
