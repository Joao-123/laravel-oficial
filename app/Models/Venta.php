<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;

    protected $table = 'ventas';

    public function mujer()
    {
        return $this->belongsToMany(Mujer::class, 'ventas_mujeres')->withPivot('manilla', 'estado');
    }

    public function producto()
    {
        return $this->belongsToMany(Producto::class, 'ventas_productos')->withPivot('cantidad', 'precio_venta', 'descuento');
    }
}
