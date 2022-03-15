<?php

namespace DefStudio\Impersonator\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \DefStudio\Impersonator\Impersonator
 */
class Impersonator extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'impersonator';
    }
}
