<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioAppController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

# RUTAS PARA LOGIN
Route::group(['prefix' => 'auth'], function () {
  # Formulario de inicio de sesión
  Route::get('login', [AuthController::class, 'index'])->name('login');
  # Acción de inicio de sesión
  Route::post('login', [AuthController::class, 'login']);
  # Acción de cierre de sesión
  Route::post('logout', [AuthController::class, 'logout']);
});

# RUTAS PARA CLIENTE
# Index
Route::get('/', [AuthController::class, 'index']);

# RUTAS PARA ADMINISTRADOR
Route::group(['prefix' => 'admin'], function () {
  Route::group(['middleware' => ['auth']], function () {
    # Página de bienvenida de usuario con sesión iniciada
    Route::get('', [DashboardController::class, 'index']);

    # Módulo de gestión de usuarios admin
    Route::group(['prefix' => 'usuario'], function () {
      Route::get('', [UsuarioController::class, 'index']);
      Route::get('create', [UsuarioController::class, 'create']);
      Route::post('save', [UsuarioController::class, 'save']);
      Route::get('show' . '/{token}', [UsuarioController::class, 'show']);
      Route::post('edit', [UsuarioController::class, 'edit']);
      Route::post('delete', [UsuarioController::class, 'delete']);
    });
    # Módulo de gestión de usuarios app
    Route::group(['prefix' => 'usuarioapp'], function () {
      Route::get('', [UsuarioAppController::class, 'index']);
      Route::get('create', [UsuarioAppController::class, 'create']);
      Route::post('save', [UsuarioAppController::class, 'save']);
      Route::get('show' . '/{token}', [UsuarioAppController::class, 'show']);
      Route::post('edit', [UsuarioAppController::class, 'edit']);
      Route::post('delete', [UsuarioAppController::class, 'delete']);
    });
  });
});
