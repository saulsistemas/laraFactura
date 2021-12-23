<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\VentaDetalleController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return 'Hola mundo';
});

Route::resource('productos', ProductoController::class)->names('admin.productos');
Route::resource('clientes', ClienteController::class)->names('admin.clientes');
Route::resource('ventas', VentaController::class)->names('admin.ventas');
Route::get('ventas/add-product/{venta}/', [VentaDetalleController::class, 'create'])->name('admin.ventas.add_products');
Route::resource('ventas-detalles', VentaDetalleController::class)->names('admin.ventasdetalles');;
Route::post('vetnas/completa/{venta}', [VentaController::class, 'completeSend'])->name('admin.ventas.complete');