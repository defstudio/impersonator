<?php

/** @noinspection PhpUnhandledExceptionInspection */

namespace DefStudio\Impersonator\Concerns;

use DefStudio\Impersonator\Exception\ImpersonatorException;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

/**
 * @mixin Authenticatable
 * @mixin Model
 */
trait Impersonate
{
    public function can_impersonate(): bool
    {
        return true;
    }

    public function can_be_impersonated(): bool
    {
        return true;
    }

    public function is_impersonated(): bool
    {
        return ! empty(session('impersonator.id'));
    }

    public function impersonator(): self|null
    {
        $impersonator_id = session('impersonator.id');

        return self::find($impersonator_id);
    }

    public function get_impersonator_stop_redirect_url(): string|null
    {
        return session('impersonator.return_url');
    }

    public function get_impersonate_url(string $redirect_url = null): string
    {
        $parameters = ['user' => $this];

        if ($redirect_url) {
            $parameters['return_url'] = $redirect_url;
        }

        return route('redirect.start', $parameters);
    }

    public function impersonate(self $another_user): bool
    {
        session()->invalidate();
        session()->regenerateToken();

        session()->regenerate();
        Auth::login($another_user);

        session()->put('impersonator.id', $this->id);
        session()->put('impersonator.return_url', request()->header('referer'));

        return true;
    }

    public function stop_impersonating(): void
    {
        $this->is_impersonated() || throw ImpersonatorException::not_impersonated();

        $impersonator = $this->impersonator();

        $impersonator || throw ImpersonatorException::impersonatorNotFound();

        session()->forget('impersonator');
        session()->invalidate();
        session()->regenerateToken();

        session()->regenerate();
        Auth::login($impersonator);
    }
}
