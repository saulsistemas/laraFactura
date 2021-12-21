<?php

use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('admin.productos.index');
});

Route::resource('productos', ProductoController::class);