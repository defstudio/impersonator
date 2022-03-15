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

        $return_to = $user->get_impersonator_redirect_url();

        $user->stop_impersonating();

        if ($return_to) {
            return redirect()->to($return_to);
        }

        return redirect()->back();
    }
}
