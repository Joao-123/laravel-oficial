<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
  public function store(Request $request) {
    $data = json_decode($request->getContent());

    $producto = new Producto();
    $producto->nombre = $data->nombre;
    $producto->precio = $data->precio;
    $producto-> stock = $data->stock;
    $producto-> estado = 'disponible';
    $producto-> manilla = $data->manilla;

    $producto->save();

    unset($producto->id);
    return $producto;
  }

  public function getAll() {
    $productos = Producto::where('estado', 'disponible')->get();
    return $productos;
  }
}
