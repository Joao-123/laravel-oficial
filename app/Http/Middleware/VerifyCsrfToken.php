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
      'http://localhost/laravel-oficial/public/meseros/add',
      'http://localhost/laravel-oficial/public/meseros/login',
      'http://localhost:8000/meseros/add',
      'http://localhost:8000/meseros/login',
    ];
}
