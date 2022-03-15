<?php

namespace DefStudio\Impersonator\Middleware;

use Closure;

class AppendUnimpersonateButton
{
    public function handle($request, Closure $next): mixed
    {
        $response = $next($request);

        return $response;
    }
}
