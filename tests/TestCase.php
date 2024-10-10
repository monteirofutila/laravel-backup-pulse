<?php

namespace MonteiroFutila\PulseSpatieLaravelBackup\Tests;

use MonteiroFutila\PulseSpatieLaravelBackup\PulseSpatieLaravelBackupServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function getPackageProviders($app)
    {
        return [
            PulseSpatieLaravelBackupServiceProvider::class,
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
