<?php

use DefStudio\Impersonator\Controllers\ImpersonatorController;
use Illuminate\Support\Facades\Route;

Route::delete('impersonate', [ImpersonatorController::class, 'stop'])
    ->middleware('auth')
    ->name('impersonate.stop');
