<?php

namespace App\Http\Middleware;

use Illuminate\Http\Middleware\TrustProxies as Middleware;

class TrustProxies extends Middleware
{
    protected $proxies = '*';

    // Tidak perlu deklarasi $headers, biarkan Laravel otomatis
}
