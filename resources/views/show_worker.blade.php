@extends('layouts.app')
@section('scripts')
@vite(['resources/js/delete_backdrop.js'])
@endsection
@section('title')
    {{ $worker_data['name']}} {{ $worker_data['last_name'] }}
@endsection
@section('content')
<div class="p-5 w-full h-screen overflow-auto">
    <div class="flex justify-center">
        <div class="bg-white p-5 rounded-lg shadow-lg flex flex-col min-w-content gap-5">
            <div>
                <label class="text-gray-500 text-sm" for="id">Rut</label>
                <h1 class="text-2xl" id="id">{{ $worker_data['id'] }}</h1>
            </div>
            <div class="flex justify-between">
                <div>
                    <label class="text-gray-500 text-sm" for="name">Nombre</label>
                    <h1 class="text-2xl" for="name">{{ $worker_data['name'] }}</h1>
                </div>
                <div>
                    <label class="text-gray-500 text-sm" for="name">Apellido</label>
                    <h1 class="text-2xl" for="last_name">{{ $worker_data['last_name'] }}</h1>
                </div>
            </div>
            <div class="overflow-auto">
                <label class="text-gray-500 text-sm" for="email">Correo electronico</label>
                <h1 class="text-2xl" for='email'>{{ $worker_data['email'] }}</h1>
            </div>
            <div>
                <label class="text-gray-500 text-sm" for="type_user">Tipo de usuario</label>
                <h1 class="text-2xl" for='type_user'>
                    @if ($worker_data['admin'] == 0)
                        usuario
                    @else
                        administrador
                    @endif
                </h1>
            </div>
            <div class="text-white flex justify-between w-full">
                <button data-modal-target="popup-modal-delete" data-modal-toggle="popup-modal-delete" class="bg-red-400 hover:bg-red-600 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 w-full">Eliminar</button>
                <button id="open-modal" data-modal-target="update-modal" data-modal-toggle="update-modal" class="bg-yellow-400 hover:bg-yellow-600 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 w-full">Modificar</button>
            </div>
        </div>

    </div>
</div>

<form action="{{ route('worker.delete', $worker_data['id']) }}" method="POST" aria-hidden="true">
    @csrf
    @method('DELETE')
    <div id="popup-modal-delete" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
        <div class="relative w-full h-full max-w-md md:h-auto">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="popup-modal-delete">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="p-6 text-center">
                    <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Estas seguro de querer eliminar a {{ $worker_data['name'] }} {{ $worker_data['last_name'] }}?</h3>
                    <button data-modal-hide="popup-modal-delete" type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                        Yes, I'm sure
                    </button>
                    <button data-modal-hide="popup-modal-delete" type="reset" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</button>
                </div>
            </div>
        </div>
    </div>    
</form>

<!-- Update modal -->
@livewire('worker-update', ['worker_data' => $worker_data]) 
@endsection