<?php /** @noinspection PhpUnhandledExceptionInspection */

namespace DefStudio\Impersonator;

use DefStudio\Impersonator\Middleware\AppendStopImpersonatingButton;
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
            ->hasRoute('web')
            ->hasViews('impersonator');
    }

    public function packageRegistered(): void
    {
        $kernel = $this->app->make(Kernel::class);
        $kernel->pushMiddleware(AppendStopImpersonatingButton::class);
    }
}
