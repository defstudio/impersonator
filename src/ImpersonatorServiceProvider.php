<?php

namespace DefStudio\Impersonator;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class ImpersonatorServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('impersonator')
            ->hasConfigFile()
            ->hasViews();
    }
}
