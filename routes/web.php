<?php

use App\Http\Controllers\MeseroController;
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

Route::post('/mesero/crear', function () {
  return view('welcome');
});

// Route::post('/meseros/add', [MeseroController::class, 'store'])->name('meseros.add');
// Route::post('/meseros/login', [MeseroController::class, 'login'])->name('meseros.login');

// Route::group(['middleware' => ['cors']], function () {
// //   Rutas a las que se permitirá acceso
// });

Route::middleware(['cors'])->group(function () {
  Route::post('/meseros/add', [MeseroController::class, 'store'])->name('meseros.add');
  Route::post('/meseros/login', [MeseroController::class, 'login'])->name('meseros.login');

  Route::post('/productos/add', [ProductoController::class, 'store'])->name('productos.add');
});