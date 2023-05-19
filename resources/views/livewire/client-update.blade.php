<div>
    <div id="update-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full" role="dialog" wire:ignore.self>
        <div class="relative w-full h-full max-w-md md:h-auto">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="update-modal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="p-6">
                    <form class="rounded-xl" wire:click.prevent>
                        @csrf
                        <div id="institution_information">
                            <h3 class="mb-4 text-xl font-medium text-gray-900">Modifique los datos que desea cambiar</h3>
                            <div class="mb-2">
                                <input wire:model="company_name" class='bg-gray-100 border-orange-400 text-sm rounded-lg block w-full p-2.5 @error('company_name')bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 @enderror' type="text" name="company_name" id="company_name" placeholder="Nombre o razon social">
                                @error('company_name') <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{ $message }}</p> @enderror
                            </div>
                            <div class="mb-2">
                                <input wire:model="address" class='bg-gray-100 border-orange-400 text-sm rounded-lg block w-full p-2.5 @error('company_name')bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 @enderror' type="text" name="address" id="address" placeholder="Direccion">
                                @error('address') <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{ $message }}</p> @enderror
                            </div>
                            <div class="mb-2">
                                <input wire:model="giro" class='bg-gray-100 border-orange-400 text-sm rounded-lg block w-full p-2.5 @error('company_name')bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 @enderror' type="text" name="giro" id="giro" placeholder="Giro">
                                @error('giro') <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{ $message }}</p> @enderror
                            </div>
                        </div>
                        <div id="representative_information">
                        <div class="mb-6 text-white flex justify-between gap-5">
                            <button wire:click="update" class="bg-orange-500 hover:bg-orange-600 p-2 rounded-xl w-full text-white" type="submit">Guardar</button>
                            <button data-modal-hide="update-modal" class="bg-yellow-400 rounded-lg p-3 w-full text-center">Cancelar</button>
                        </div>
                
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
