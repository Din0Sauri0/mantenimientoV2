<div wire:ignore.self id="representative_client-update" tabindex="-1" aria-hidden="true"
    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
    <div class="relative w-full h-full max-w-md md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button"
                class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                data-modal-hide="representative_client-update">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="px-6 py-6 lg:px-8">
                <form wire:submit.prevent class="space-y-6">
                    @csrf
                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Nombre</label>
                        <input wire:model="name" type="text" id="name" name="name"
                            class='bg-gray-100 border-orange-400 text-sm rounded-lg block w-full p-2.5 @error('
                            name')bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500
                            focus:border-red-500 @enderror'>
                        @error('name')<p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                class="font-medium">Oops!</span> {{ $message }}</p>@enderror
                    </div>
                    <div class="mt-5">
                        <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900">Apellido</label>
                        <input wire:model="last_name" type="text" id="last_name" name="last_name"
                            class='bg-gray-100 border-orange-400 text-sm rounded-lg block w-full p-2.5 @error('
                            last_name')bg-red-50 border border-red-500 text-red-900 placeholder-red-700
                            focus:ring-red-500 focus:border-red-500 @enderror'>
                        @error('last_name')<p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                class="font-medium">Oops!</span> {{ $message }}</p>@enderror
                    </div>
                    <div class="mt-5">
                        <label for="phone" class="block mb-2 text-sm font-medium text-gray-900">Telefono</label>
                        <input wire:model="phone" type="tel" name="phone" id="phone"
                            class='bg-gray-100 border-orange-400 text-sm rounded-lg block w-full p-2.5 @error('
                            phone')bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500
                            focus:border-red-500 @enderror'>
                        @error('phone')<p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                class="font-medium">Oops!</span> {{ $message }}</p>@enderror
                    </div>
                    <div class="mt-5">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                        <input wire:model="email" type="email" id="email" name="email"
                            class='bg-gray-100 border-orange-400 text-sm rounded-lg block w-full p-2.5 @error('email')bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 @enderror'>
                        @error('email')<p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{ $message }}</p>@enderror
                    </div>
                    <div class="flex gap-2 text-white mt-5">
                        <button wire:click="update" class="bg-orange-500 rounded-lg p-2.5 w-full">Guardar</button>
                        <button data-modal-hide="representative_client-update"
                            class="bg-yellow-400 rounded-lg p-2.5 w-full">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>