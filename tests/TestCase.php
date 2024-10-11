<?php

namespace MonteiroFutila\LaravelBackupPulse\Tests;

use Livewire\LivewireServiceProvider;
use MonteiroFutila\LaravelBackupPulse\LaravelBackupPulseServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function getPackageProviders($app)
    {
        return [
            LaravelBackupPulseServiceProvider::class,
            LivewireServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');

        /*
        $migration = include __DIR__.'/../database/migrations/create_skeleton_table.php.stub';
        $migration->up();
        */
    }
}
