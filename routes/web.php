<?php

use Illuminate\Support\Facades\Route;
//Controladores
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\LoginUserController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\WorkerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductItemController;
use App\Http\Controllers\ClientRepresentativeController;

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
    return redirect()->route('login');
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
// Route::controller(HomeController::class)->middleware(['auth'])->group(function (){
//     Route::get('/home','index')->name('home');
// });
Route::controller(ClientController::class)->middleware(['auth'])->group(function(){
    Route::get('/cliente', 'index')->name('client');
    Route::get('/registrar_cliente', 'create')->name('client.create');
    Route::post('/registrar_cliente', 'store')->name('client.store');
    Route::get('/cliente/{id}', 'show')->name('client.show');
    Route::get('/cliente/editar/{id}', 'edit')->name('client.edit');
    Route::patch('/cliente/editar/{id}', 'update')->name('client.update');
    Route::delete('/cliente/{id}', 'delete')->name('client.delete');

});
Route::controller(ClientRepresentativeController::class)->middleware(['auth'])->group(function(){
    Route::post('/cliente/representante', 'store')->name('client_representative.store');
    Route::delete('/representante/{id}', 'delete')->name('client_representative.delete');
});
Route::controller(WorkerController::class)->middleware(['auth'])->group(function(){
    Route::get('/trabajadores', 'index')->name('worker');
    Route::get('/registrar_trabajdor', 'create')->name('worker.create');
    Route::post('/registrar_trabajador', 'store')->name('worker.store');
    Route::get('/trabajador/{id}', 'show')->name('worker.show');
    Route::delete('/trabajador/{id}', 'delete')->name('worker.delete');
    Route::get('/trabajador/editar/{id}', 'edit')->name('worker.edit');
    Route::patch('/trabajador/editar/{id}', 'update')->name('worker.update');
});

Route::controller(ProductController::class)->middleware(['auth'])->group(function(){
    Route::get('/productos', 'index')->name('product');
    Route::get('/registrar_producto', 'create')->name('product.create');
    Route::post('/registrar_producto', 'store')->name('product.store');
    Route::get('/producto/{id}', 'show')->name('product.show');
    Route::delete('/producto/{id}', 'delete')->name('product.delete');
});

Route::controller(ProductItemController::class)->middleware(['auth'])->group(function(){
    Route::post('/product_item', 'store')->name('product_item.store');
    Route::delete('/product_item/{id}', 'delete')->name('product_item.delete');
});
Route::controller(ProjectController::class)->middleware(['auth'])->group(function(){
    Route::get('/proyectos', 'index')->name('project');
    Route::get('/registrar_proyecto', 'create')->name('project.create');
    Route::post('/registrar_proyecto', 'store')->name('project.store');
    Route::get('/proyecto/{id}', 'show')->name('project.show');
});

