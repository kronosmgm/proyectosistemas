<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\ClasificacionController;
use App\Http\Controllers\ProcedenciaController;
use App\Http\Controllers\ProductoController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/productos/pdf', [ProductoController::class, 'pdf'])->name('productos.pdf');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('marcas', MarcaController::class); 
Route::resource('clasificacions', ClasificacionController::class); 
Route::resource('procedencias', ProcedenciaController::class); 
Route::resource('productos', ProductoController::class);

