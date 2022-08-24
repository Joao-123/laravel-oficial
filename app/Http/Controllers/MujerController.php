<?php

namespace App\Http\Controllers;

use App\Models\Mujer;
use Illuminate\Http\Request;

class MujerController extends Controller
{
    public function getAll() {
        $mujeres = Mujer::where('estado', 'activo')->get();
        return $mujeres;
      }
}
