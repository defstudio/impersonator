<?php

namespace DefStudio\Impersonator;

use DefStudio\Impersonator\Middleware\AppendUnimpersonateButton;
use Illuminate\Contracts\Http\Kernel;
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

    public function packageRegistered(): void
    {
        $kernel = $this->app->make(Kernel::class);
        $kernel->pushMiddleware(AppendUnimpersonateButton::class);
    }
}
