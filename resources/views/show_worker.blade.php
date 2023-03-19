@extends('layouts.app')
@section('scripts')
@vite(['resources/js/delete_backdrop.js'])
@endsection
@section('title')
    {{ $worker_data['name']}} {{ $worker_data['last_name'] }}
@endsection
@section('content')
<div class="p-5 flex flex-col justify-center gap-5">
    <form class="bg-white p-5 rounded-xl shadow-xl" action="{{ route('worker.store') }}" method="POST">
        @csrf
        <div class="mb-6">
            <label for="rut" class="block mb-2 text-sm font-medium text-gray-900">RUT</label>
            <h1 class="text-2xl">{{ $worker_data['id'] }}</h1>
        </div>
        <div class="flex flex-row gap-7 mb-6">
            <div class="w-full">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Nombre</label>
                <h1 class="text-2xl">{{ $worker_data['name'] }}</h1>
            </div>
            <div class="w-full">
                <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900">Apellido</label>
                <h1 class="text-2xl">{{ $worker_data['last_name'] }}</h1>
            </div>
        </div>
        <div class="mb-6">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
            <h1 class="text-2xl">{{ $worker_data['email'] }}</h1>
        </div>
        <div class="mb-6">
            <div class="w-full">
                <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Contraseña</label>
                <h1 class="text-2xl">•••••••••</h1>
            </div>
        </div>
        <div class="mb-6">
            <label for="admin">Tipo de usuario</label>
            <h1 class="text-2xl">@if($worker_data['admin'] = 1) Administrador @else Usuario @endif</h1>
        </div>
        <div class="mb-6 text-white flex flex-col text-center gap-3">
            <a data-modal-target="popup-modal" data-modal-toggle="popup-modal" class="bg-red-500 rounded-lg p-2.5">Eliminar</a>
            <a class="bg-yellow-400 rounded-lg p-2.5" href="{{ route('worker.edit', $worker_data['id']) }}">Editar</a>
        </div>
    </form>

</div>

<!-- delete modal -->
<form action="{{ route('worker.delete', $worker_data['id']) }}" method="POST">
    @csrf
    @method('DELETE')
    <div id="popup-modal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
        <div class="relative w-full h-full max-w-md md:h-auto">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="popup-modal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="p-6 text-center">
                    <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Estas seguro de elimar a {{ $worker_data['name'] }} {{ $worker_data['last_name'] }}?</h3>
                    <button data-modal-hide="popup-modal" type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                        Si, estoy seguro
                    </button>
                    <button id="cancel_btn" data-modal-hide="popup-modal" type="reset" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancelar</button>
                </div>
            </div>
        </div>
      </div>
</form>

{{-- <script>
    const delete_backdrop = () => {
        console.log('click');
        let index = document.querySelectorAll('div[modal-backdrop]').length;
        if(index > 1){
            element = document.querySelector('div[modal-backdrop]');
            element.parentNode.removeChild(element);
            console.log(element);
        }
    }
</script> --}}
    
@endsection