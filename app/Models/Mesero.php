<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mesero extends Model
{
    use HasFactory;

    protected $table = 'meseros';

    protected $fillable = [
      'ci',
      'nombres',
      'apellidos',
      'cell',
      'estado',
      'contrasenia'
    ];
}
