<?php

use DefStudio\Impersonator\Controllers\ImpersonatorController;
use Illuminate\Support\Facades\Route;

Route::delete('impersonate', [ImpersonatorController::class, 'stop'])
    ->middleware('web')
    ->middleware('auth')
    ->name('impersonate.stop');

Route::get('impersonate/{user}', [ImpersonatorController::class, 'start'])
    ->middleware('web')
    ->middleware('auth')
    ->name('impersonate.start');
