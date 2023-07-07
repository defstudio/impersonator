<?php

namespace DefStudio\Impersonator\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;

class AppendStopImpersonatingButton
{
    public function handle($request, Closure $next): mixed
    {
        $response = $next($request);

        $user = Auth::user();

        if(! $user) {
            return $response;
        }

        if(! method_exists($user, 'is_impersonated')) {
            return $response;
        }

        if (! Auth::user()?->is_impersonated()) {
            return $response;
        }

        $content = $response->getContent();

        if (! $content) {
            return $response;
        }

        if (! str($content)->lower()->startsWith("<!doctype html>")) {
            return $response;
        }

        $before_body_close = str($content)->before('</body>');
        $after_body_close = str($content)->after('</body>');

        $stop_button_view = match (config('impersonator.css.framework')) {
            'bootstrap_4' => 'impersonator::bootstrap.4.stop-impersonating-button',
            default => 'impersonator::tailwind.3.stop-impersonating-button',
        };

        $button = Blade::render($stop_button_view);

        $content = $before_body_close
            ->append($button)
            ->append('</body>')
            ->append($after_body_close);

        $response->setContent((string) $content);

        return $response;
    }
}
