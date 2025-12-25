<?php

use App\Http\Controllers\CompraController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PermisoController;
use App\Http\Controllers\ProduccionController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\VentasproductoController;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Support\Facades\Route;

//Rutas del login
Route::get('/', [LoginController::class,'index'])->name('login');
Route::post('/login', [LoginController::class,'authenticate'])->name('login.authenticate');

//Ruta del Inicio
Route::get('/inicio', [InicioController::class, 'index'])->name('inicio');


//Ruta de Usuarios
Route::resource('usuarios', UsuarioController::class);

//Ruta de Permisos
Route::resource('permisos', PermisoController::class);

//Ruta de Proveedores
Route::resource('proveedores', ProveedorController::class);

//Ruta de Compras
Route::resource('compras', CompraController::class);

//Ruta de Produccion
Route::resource('produccion', ProduccionController::class);

//Ruta de Productos
Route::resource('productos', ProductoController::class);

//Ruta de Venta
Route::resource('venta', VentaController::class);

//Ruta de Ventas-Productos
Route::resource('ventaproducto', VentasproductoController::class);
