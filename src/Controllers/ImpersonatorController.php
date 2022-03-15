<?php

/** @noinspection PhpUnhandledExceptionInspection */

namespace DefStudio\Impersonator\Controllers;

use DefStudio\Impersonator\Concerns\Impersonate;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class ImpersonatorController
{
    public function stop(): RedirectResponse
    {
        /** @var Impersonate $user */
        $user = Auth::user();

        if ($user === null) {
            abort(404);
        }

        if (! $user->is_impersonated()) {
            abort(404);
        }

        $return_to = $user->get_impersonator_stop_redirect_url();

        $user->stop_impersonating();

        if ($return_to) {
            return redirect()->to($return_to);
        }

        return redirect()->back();
    }

    public function start($user): RedirectResponse
    {
        /** @var Impersonate $user */
        $user = Auth::createUserProvider(config('auth.guards.web.provider'))->retrieveById($user);

        abort_if($user === null, 404);

        /** @var Impersonate $impersonator */
        $impersonator = Auth::user();

        abort_if(! $impersonator->can_impersonate(), 403);

        abort_if(! $user->can_be_impersonated(), 403);

        $impersonator->impersonate($user);

        if ($return_url = request()->get('return_url')) {
            return redirect()->to($return_url);
        }

        return redirect()->intended();
    }
}
