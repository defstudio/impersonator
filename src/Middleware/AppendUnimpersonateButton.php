<?php

namespace DefStudio\Impersonator\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;

class AppendUnimpersonateButton
{
    public function handle($request, Closure $next): mixed
    {
        $response = $next($request);

        if (! Auth::user()?->is_impersonated()) {
            return $response;
        }

        $content = $response->getContent();

        if (! $content) {
            return $response;
        }

        if (! str($content)->startsWith("<!DOCTYPE html>")) {
            return $response;
        }

        $before_body_close = str($content)->before('</body>');
        $after_body_close = str($content)->after('</body>');

        $button = Blade::render('impersonator:unimpersonate');

        $content = $before_body_close
            ->append($button)
            ->append('</body>')
            ->append($after_body_close);

        $response->setContent((string)$content);

        return $response;
    }
}
