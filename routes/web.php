<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return 'Hola mundo';
});

Route::resource('productos', ProductoController::class)->names('admin.productos');
Route::resource('clientes', ClienteController::class)->names('admin.clientes');