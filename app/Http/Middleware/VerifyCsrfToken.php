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
        'https://df4d-180-254-64-157.ngrok-free.app/midtrans/notification',
        'raven-touched-ghastly.ngrok-free.app/midtrans/notification',
    ];
}
