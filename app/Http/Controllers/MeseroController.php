<?php

namespace App\Http\Controllers;

use App\Models\Mesero;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MeseroController extends Controller
{
    public function store(Request $request) {
      $data = json_decode($request->getContent());
      $mesero = new Mesero();
      $mesero->nombres = $data->nombres;
      $mesero->ci = $data->ci;
      $mesero-> apellidos = $data->apellidos;
      $mesero-> cell = $data->cell;
      $mesero-> estado = $data->estado;
      $mesero-> contrasenia = bcrypt($data->password);

      $mesero->save();
      // $mesero = Mesero::create($request->only(['nombres', 'ci', 'apellidos', 'cell', 'estado']) +
      // [
      //   'contrasenia'=> bcrypt(value: $request->input( key: 'password'))
      // ]);
      return $mesero;
    }

    public function login(Request $request) {
      $mesero = Mesero::where('ci', $request->ci)->first();
      if ($mesero && Hash::check($request->password, $mesero->contrasenia)) {
        unset($mesero->contrasenia, $mesero->id, $mesero->created_at, $mesero->updated_at);
        return $mesero;
      }else {
        return 'not found';
      }
    }
}
