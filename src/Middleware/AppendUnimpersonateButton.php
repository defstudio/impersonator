<?php

namespace DefStudio\Impersonator\Middleware;

class AppendUnimpersonateButton
{
    public function handle($request, \Closure $next): mixed
    {
        $response = $next();

        return $response;
    }
}
