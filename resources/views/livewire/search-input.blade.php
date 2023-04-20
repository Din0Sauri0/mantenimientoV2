<div>
    <form class="w-[40%] flex mb-3 gap-3" wire:submit.prevent>
        <input class='bg-gray-100 border-orange-400 text-sm rounded-lg block w-full p-2.5' type="text" wire:model="search_input">
        <button wire:click="search" class="bg-white rounded-full shadow-xl p-3">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
            </svg>
              
        </button>
    </form>
    @livewire('table-result', ['id' => $childId, 'result' => $result, 'maintenance' => $maintenance])
</div>

