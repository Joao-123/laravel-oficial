<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function store(Request $request) {
      $data = json_decode($request->getContent());

      $usuario = new Usuario();
      $usuario->nombres = $data->nombres;
      $usuario->ci = $data->ci;
      $usuario-> apellidos = $data->apellidos;
      $usuario-> edad = $data->edad;
      $usuario-> rol = $data->rol;
      $usuario-> cell = $data->cell;
      $usuario-> estado = $data->estado;
      $usuario-> contrasenia = bcrypt($data->password);

      $usuario->save();
      unset($usuario->contrasenia, $usuario->id);
      // $usuario = Usuario::create($request->only(['nombres', 'ci', 'apellidos', 'cell', 'estado']) +
      // [
      //   'contrasenia'=> bcrypt(value: $request->input( key: 'password'))
      // ]);
      return $usuario;
    }

    public function login(Request $request) {
      $data = json_decode($request->getContent());

      $usuario = Usuario::where('ci', $data->ci)->first();
      if ($usuario && Hash::check($data->password, $usuario->contrasenia)) {
        unset($usuario->contrasenia, $usuario->id, $usuario->created_at, $usuario->updated_at);
        return $usuario;
      }else {
        $mensaje['msj'] = 'not found';
        return $mensaje;
      }
    }
}
