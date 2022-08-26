<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use App\Models\VentaMujer;
use App\Models\VentaProducto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VentaController extends Controller
{
  public function store(Request $request) {
    $data = json_decode($request->getContent());

    $out = new \Symfony\Component\Console\Output\ConsoleOutput();

    $venta = new Venta();
    $venta->usuarios_id = $data->user->id;
    $venta->total = $data->detalles->total;

    // para solucionar despues
    $venta->numero_venta = 1;
    $venta->ganancia_casa = 1;
    $venta->ganancia_mujer = 1;

    $venta->save();
    $out->writeln($venta);

    foreach ($data->mujeres as $mujer) {
      $venta_mujer = new VentaMujer();
      $venta_mujer->ventas_id = $venta->id;
      $venta_mujer->mujeres_id = $mujer->data->id;
      $venta_mujer->manilla = $mujer->manilla;

      // para solucionar-para controlar las manillas que se deben cancelar y cuales ya lo fueron
      // venta_mujer->estado (pendiente, cancelado)  

      $venta_mujer->save();
      $out->writeln($venta_mujer);
    }

    foreach ($data->productos as $product) {
      $venta_producto = new VentaProducto();
      $venta_producto->ventas_id = $venta->id;
      $venta_producto->productos_id = $product->data->id;
      $venta_producto->cantidad = $product->cantidad;
      $venta_producto->precio_venta = $product->data->precio;
      if ($product->descuento != null) {
          $venta_producto->descuento = $product->descuento;
      } else {
          $venta_producto->descuento = 0;
      }

      $venta_producto->save();
      $out->writeln($venta_producto);
    }

    return $data;
  }

  public function getByUser(Request $request) {
    $ventas = DB::table('ventas')

    ->where('ventas.usuarios_id', '=', $request->id)

    ->join('ventas_mujeres', 'ventas_mujeres.ventas_id', '=', 'ventas.id')
    ->join('mujeres', 'mujeres.id', '=', 'ventas_mujeres.mujeres_id')

    ->join('ventas_productos', 'ventas_productos.ventas_id', '=', 'ventas.id')
    ->join('productos', 'productos.id', '=', 'ventas_productos.productos_id')

    ->get();

     return $ventas;
  }
}
