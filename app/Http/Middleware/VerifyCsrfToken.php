<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
      'http://localhost/laravel-oficial/public/usuarios/add',
      'http://localhost/laravel-oficial/public/usuarios/login',
      'http://localhost:8000/usuarios/add',
      'http://localhost:8000/usuarios/login',
      'http://localhost:8000/productos/add',
      'http://localhost:8000/productos/all',

      'http://localhost:8000/mujeres/all',
    ];
}
