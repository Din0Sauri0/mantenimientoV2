<?php

use Illuminate\Support\Facades\Route;
//Controladores
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\LoginUserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\WorkerController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::controller(RegisterUserController::class)->middleware(['guest'])->group(function (){
    Route::get('/registrar','index')->name('register');
    Route::post('/registrar','store')->name('register.post');
});
Route::controller(LoginUserController::class)->middleware(['guest'])->group(function (){
    Route::get('/login','index')->name('login');
    Route::post('/login','store')->name('login.post');
    Route::get('/logout','destroy')->name('logout');
});
Route::controller(HomeController::class)->middleware(['auth'])->group(function (){
    Route::get('/home','index')->name('home');
});
Route::controller(ClientController::class)->middleware(['auth'])->group(function(){
    Route::get('/cliente', 'index')->name('client');
    Route::get('/registrar_cliente', 'create')->name('client.create');
    Route::post('/registrar_cliente', 'store')->name('client.store');
    Route::get('/cliente/{id}', 'show')->name('client.show');
    Route::get('/cliente/editar/{id}', 'edit')->name('client.edit');
    Route::patch('/cliente/editar/{id}', 'update')->name('client.update');
    Route::delete('/cliente/{id}', 'delete')->name('client.delete');

});
Route::controller(WorkerController::class)->middleware(['auth'])->group(function(){
    Route::get('/trabajadores', 'index')->name('worker');
    Route::get('/registrar_trabajdor', 'create')->name('worker.create');
    Route::post('/registrar_trabajador', 'store')->name('worker.store');
});


