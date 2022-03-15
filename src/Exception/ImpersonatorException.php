<?php

namespace DefStudio\Impersonator\Exception;

use Exception;

class ImpersonatorException extends Exception
{
    public static function not_impersonated(): self
    {
        return new self("User is not impersonated");
    }

    public static function impersonatorNotFound(): self
    {
        return new self("Impersonator not found");
    }
}
