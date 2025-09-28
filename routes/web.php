<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CitaController;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\PermisoController;
use App\Http\Controllers\PermisosHasrolController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\UsuarioController;


Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])
->resource('cita',CitaController::class)
->names('cita');

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])
->resource('invetario',InventarioController::class)
->names('inventario');

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])
->resource('permisohasrol',PermisosHasRolController::class)
->names('permisohasrol');

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])
->resource('permiso',PermisoController::class)
->names('permiso');

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])
->resource('producto',ProductoController::class)
->names('producto');

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])
->resource('proveedor',ProveedorController::class)
->names('proveedor');

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])
->resource('rol',RolController::class)
->names('rol');

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])
->resource('servicio',ServicioController::class)
->names('servicio');

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])
->resource('usuario',UsuarioController::class)
->names('usuario');

Route::get('/', function () {
    return view('welcome');
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
