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
       '/document/image/*',
       '/processing/document/image/*',
       '/quality-scan/document/image/*',
       '/quality-control/document/image/*',
       '/quality-control/processing/document/image/*',
       '/quality-control/scanning/document/image/*',
    ];
}
