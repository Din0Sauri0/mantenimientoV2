<div id="item-update-{{$value->id}}" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full"  wire:ignore.self>
    <div class="relative w-full h-full max-w-md md:h-auto">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button"
                class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                data-modal-hide="item-update-{{$value->id}}">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <form wire:submit.prevent>
                @csrf
                <div class="p-6 text-gray-500 flex flex-col">
                    <label for="serial_number">Número de serie</label>
                    <input wire:model="serial_number" type="text" name="serial_number" class='bg-gray-100 border-orange-400 text-sm rounded-lg block w-full p-2.5 @error('serial_number')bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 @enderror'>
                    @error('serial_number')<p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{ $message }}</p>@enderror
                </div>
                <div class="flex justify-between gap-2 text-white p-5">
                    <button wire:click="update" class="bg-orange-400 p-2 rounded-lg w-full">Aceptar</button>
                    <button data-modal-hide="item-update-{{$value->id}}" class="bg-yellow-300 p-2 rounded-lg w-full" type="reset">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>