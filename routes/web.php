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
Route::controller(RegisterUserController::class)->group(function (){
    Route::get('/registrar','index')->name('register');
    Route::post('/registrar','store')->name('register.post');
});
Route::controller(LoginUserController::class)->group(function (){
    Route::get('/login','index')->name('login');
    Route::post('/login','store')->name('login.post');
    Route::get('/logout','destroy')->name('logout');
});
Route::controller(HomeController::class)->group(function (){
    Route::get('/home','index')->name('home')->middleware('auth');
});
Route::controller(ClientController::class)->group(function(){
    Route::get('/cliente', 'index')->name('client')->middleware('auth');
    Route::get('/registrar_cliente', 'create')->name('client.create')->middleware('auth');
    Route::post('/registrar_cliente', 'store')->name('client.store')->middleware('auth');
    Route::get('/cliente/{id}', 'show')->name('client.show')->middleware('auth');
    Route::get('/cliente/editar/{id}', 'edit')->name('client.edit')->middleware('auth');
    Route::patch('/cliente/editar/{id}', 'update')->name('client.update')->middleware('auth');
    Route::delete('/cliente/{id}', 'delete')->name('client.delete')->middleware('auth');

});
Route::controller(WorkerController::class)->group(function(){
    Route::get('/trabajadores', 'index')->name('worker')->middleware('auth');
    Route::get('/registrar_trabajador', 'create')->name('worker.create')->middleware('auth');
    Route::post('/registrar_trabajador', 'store')->name('worker.store')->middleware('auth');
});


