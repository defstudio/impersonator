<?php

namespace DefStudio\Impersonator\Concerns;

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
        return ! empty(session('impersonator'));
    }

    public function impersonator(): self|null
    {
        $impersonator_id = session('impersonator');

        return self::find($impersonator_id);
    }

    public function impersonate(self $another_user): self
    {
        session()->invalidate();
        session()->regenerateToken();

        session()->regenerate();
        Auth::login($another_user);

        session()->put('impersonator', $this->id);

        return $another_user;
    }
}
