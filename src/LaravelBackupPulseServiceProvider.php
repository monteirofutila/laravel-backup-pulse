<?php

namespace MonteiroFutila\LaravelBackupPulse;

use Livewire\Livewire;
use MonteiroFutila\LaravelBackupPulse\Livewire\Backups;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LaravelBackupPulseServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-backup-pulse')
            ->hasViews();
    }

    public function bootingPackage(): void
    {
        Livewire::component('backups', Backups::class);
    }
}
