@extends('layouts.app')
@section('title')
{{ $product->brand }} - {{ $product->name }}
@endsection
@section('content')
<div class="p-5 w-full h-screen overflow-auto">
    <div class="w-full flex gap-5 justify-around items-center">
        <div>
            <img class="rounded-full border-4 border-white shadow-xl"
                src="{{ asset('img/malldelcentroconcepcion.png') }}" alt="">
        </div>
        <div class="bg-white rounded-xl shadow-xl p-5 flex flex-col gap-5">
            <div class="flex gap-5">
                <div>
                    <label class="text-gray-500">Nombre.</label>
                    <h1 class="text-2xl">{{ $product->name }}</h1>
                </div>
                <div>
                    <label class="text-gray-500">Marca.</label>
                    <h1 class="text-2xl">{{ $product->brand }}</h1>
                </div>
            </div>
            <div>
                <label class="text-gray-500" for="model">Modelo.</label>
                <h1 class="text-2xl" id="model">{{ $product->model }}</h1>
            </div>
            <div>
                <label class="text-gray-500" for="description">Descripción.</label>
                <h1 class="text-2xl">{!! nl2br($product->specification) !!}</h1>
            </div>
            <div class="text-white flex flex-row justify-between gap-3 text-center mt-5">
                <button class="bg-red-500 rounded-xl p-3">Eliminar</button>
                <a class="bg-yellow-300 rounded-xl p-3" href="#">Modificar</a>
            </div>
        </div>
    </div>
    <div class="flex flex-col">

        <button class="w-5 h-5 rounded-full p-5 flex justify-center items-center mb-3 bg-white shadow-xl text-gray-500">+</button>
        
        <div class="relative overflow-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Nº
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Numero de serie
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Estado
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            1
                        </th>
                        <td class="px-6 py-4">
                            345.234-p
                        </td>
                        <td class="px-6 py-4">
                            <div class="bg-green-400 rounded-full p-1 text-white w-20 text-center">Instalado</div>
                        </td>
                    </tr>
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            2
                        </th>
                        <td class="px-6 py-4">
                            345.234-p
                        </td>
                        <td class="px-6 py-4">
                            <div class="bg-red-400 rounded-full p-1 text-white w-24 text-center">No instalado</div>
                        </td>
                    </tr>
                    <tr class="bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            3
                        </th>
                        <td class="px-6 py-4">
                            345.234-p
                        </td>
                        <td class="px-6 py-4">
                            <div class="bg-green-400 rounded-full p-1 text-white w-20 text-center">Instalado</div>
                        </td>
                    </tr>
                    <tr class="bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            3
                        </th>
                        <td class="px-6 py-4">
                            345.234-p
                        </td>
                        <td class="px-6 py-4">
                            <div class="bg-green-400 rounded-full p-1 text-white w-20 text-center">Instalado</div>
                        </td>
                    </tr>
                    <tr class="bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            3
                        </th>
                        <td class="px-6 py-4">
                            345.234-p
                        </td>
                        <td class="px-6 py-4">
                            <div class="bg-green-400 rounded-full p-1 text-white w-20 text-center">Instalado</div>
                        </td>
                    </tr>
                    <tr class="bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            3
                        </th>
                        <td class="px-6 py-4">
                            345.234-p
                        </td>
                        <td class="px-6 py-4">
                            <div class="bg-green-400 rounded-full p-1 text-white w-20 text-center">Instalado</div>
                        </td>
                    </tr>
                    <tr class="bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            3
                        </th>
                        <td class="px-6 py-4">
                            345.234-p
                        </td>
                        <td class="px-6 py-4">
                            <div class="bg-green-400 rounded-full p-1 text-white w-20 text-center">Instalado</div>
                        </td>
                    </tr>
                    <tr class="bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            3
                        </th>
                        <td class="px-6 py-4">
                            345.234-p
                        </td>
                        <td class="px-6 py-4">
                            <div class="bg-green-400 rounded-full p-1 text-white w-20 text-center">Instalado</div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<button data-modal-target="popup-modal" data-modal-toggle="popup-modal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
    Toggle modal
  </button>
  
  <div id="popup-modal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
      <div class="relative w-full h-full max-w-md md:h-auto">
          <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
              <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="popup-modal">
                  <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                  <span class="sr-only">Close modal</span>
              </button>
              <div class="p-6 text-center">
                  <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                  <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this product?</h3>
                  <button data-modal-hide="popup-modal" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                      Yes, I'm sure
                  </button>
                  <button data-modal-hide="popup-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</button>
              </div>
          </div>
      </div>
  </div>


@endsection