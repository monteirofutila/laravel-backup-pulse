<?php

namespace MonteiroFutila\PulseSpatieLaravelBackup;

use Livewire\Livewire;
use MonteiroFutila\PulseSpatieLaravelBackup\Livewire\Backups;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class PulseSpatieLaravelBackupServiceProvider extends PackageServiceProvider
{

    public function configurePackage(Package $package): void
    {
        $package
            ->name('pulse-backup')
            ->hasViews();
    }

    public function bootingPackage(): void
    {
        Livewire::component('backup', Backups::class);
    }
}
