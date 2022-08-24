<?php

use App\Http\Controllers\MujerController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Route;

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

Route::post('/usuario/crear', function () {
  return view('welcome');
});

// Route::post('/usuarios/add', [UsuarioController::class, 'store'])->name('usuarios.add');
// Route::post('/usuarios/login', [UsuarioController::class, 'login'])->name('usuarios.login');

// Route::group(['middleware' => ['cors']], function () {
// //   Rutas a las que se permitirá acceso
// });

Route::middleware(['cors'])->group(function () {
  Route::post('/usuarios/add', [UsuarioController::class, 'store'])->name('usuarios.add');
  Route::post('/usuarios/login', [UsuarioController::class, 'login'])->name('usuarios.login');

  Route::post('/productos/add', [ProductoController::class, 'store'])->name('productos.add');
  Route::get('/productos/all', [ProductoController::class, 'getAll'])->name('productos.all');

  Route::get('/mujeres/all', [MujerController::class, 'getAll'])->name('mujeres.all');
});