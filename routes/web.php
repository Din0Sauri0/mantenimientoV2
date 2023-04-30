<?php

use Illuminate\Support\Facades\Route;
//Controladores
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\LoginUserController;
use App\Http\Controllers\projectController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\WorkerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductItemController;
use App\Http\Controllers\ClientRepresentativeController;
use App\Http\Controllers\MaintenanceController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\ImageController;


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
Route::controller(LoginUserController::class)->group(function (){
    Route::get('/login','index')->name('login');
    Route::post('/login','store')->name('login.post');
    Route::get('/logout','destroy')->name('logout');
});
// Route::controller(HomeController::class)->middleware(['auth'])->group(function (){
//     Route::get('/home','index')->name('home');
// });
Route::controller(ClientController::class)->middleware(['auth'])->group(function(){
    Route::get('/cliente', 'index')->name('client');
    Route::get('/registrar_cliente', 'create')->name('client.create')->middleware('admin');
    Route::post('/registrar_cliente', 'store')->name('client.store')->middleware('admin');
    Route::get('/cliente/{id}', 'show')->name('client.show');
    Route::get('/cliente/editar/{id}', 'edit')->name('client.edit')->middleware('admin');
    Route::patch('/cliente/editar/{id}', 'update')->name('client.update')->middleware('admin');
    Route::delete('/cliente/{id}', 'delete')->name('client.delete')->middleware('admin');

});
Route::controller(ClientRepresentativeController::class)->middleware(['auth'])->group(function(){
    Route::post('/cliente/representante', 'store')->name('client_representative.store')->middleware('admin');
    Route::delete('/representante/{id}', 'delete')->name('client_representative.delete')->middleware('admin');
});
Route::controller(WorkerController::class)->middleware(['auth'])->group(function(){
    Route::get('/trabajadores', 'index')->name('worker');
    Route::get('/registrar_trabajdor', 'create')->name('worker.create')->middleware('admin');
    Route::post('/registrar_trabajador', 'store')->name('worker.store')->middleware('admin');
    Route::get('/trabajador/{id}', 'show')->name('worker.show');
    Route::delete('/trabajador/{id}', 'delete')->name('worker.delete')->middleware('admin');
    Route::get('/trabajador/editar/{id}', 'edit')->name('worker.edit')->middleware('admin');
    Route::patch('/trabajador/editar/{id}', 'update')->name('worker.update')->middleware('admin');
});

Route::controller(ProductController::class)->middleware(['auth'])->group(function(){
    Route::get('/productos', 'index')->name('product');
    Route::get('/registrar_producto', 'create')->name('product.create')->middleware('admin');
    Route::post('/registrar_producto', 'store')->name('product.store')->middleware('admin');
    Route::get('/producto/{id}', 'show')->name('product.show');
    Route::delete('/producto/{model}', 'delete')->name('product.delete')->middleware('admin');
});

Route::controller(ProductItemController::class)->middleware(['auth'])->group(function(){
    Route::post('/product_item', 'store')->name('product_item.store')->middleware('admin');
    Route::delete('/product_item/{id}', 'delete')->name('product_item.delete')->middleware('admin');
    Route::patch('/item/{id}', 'patch')->name('product_item.patch')->middleware('admin');
    Route::patch('/item/delete/{id}', 'patch_delete')->name('product_item.patch_delete')->middleware('admin');
    Route::patch('/item/update/location/{id}', 'patch_location')->name('product_item.patch_location')->middleware('admin');
});
Route::controller(projectController::class)->middleware(['auth'])->group(function(){
    Route::get('/proyectos', 'index')->name('project');
    Route::get('/registrar_proyecto', 'create')->name('project.create')->middleware('admin');
    Route::post('/registrar_proyecto', 'store')->name('project.store')->middleware('admin');
    Route::get('/proyecto/{id}', 'show')->name('project.show');
    Route::delete('/proyecto/{id}', 'delete')->name('project.delete')->middleware('admin');
});

Route::controller(MaintenanceController::class)->middleware(['auth'])->group(function(){
    Route::get('/mantencion/{id}', 'show')->name('maintenance.show');
});

Route::controller(PDFController::class)->middleware(['auth'])->group(function(){
    Route::get('reporte/pdf/{id}', 'index')->name('reporte.pdf');
});

Route::controller(ImageController::class)->middleware(['auth'])->group(function(){
    Route::post('/image/clients', 'store_client')->name('image.client');
});

