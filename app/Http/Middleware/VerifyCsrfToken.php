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
        //
        'https://oishii.my.id/midtrans/notification',
        'https://769e-61-5-25-207.ngrok-free.app/midtrans/notification',
        'raven-touched-ghastly.ngrok-free.app/midtrans/notification',
    ];
}
