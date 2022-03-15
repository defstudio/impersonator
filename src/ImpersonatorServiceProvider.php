<?php

namespace DefStudio\Impersonator;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use DefStudio\Impersonator\Commands\ImpersonatorCommand;

class ImpersonatorServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('impersonator')
            ->hasConfigFile()
            ->hasViews();
    }
}
