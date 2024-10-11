<?php

namespace MonteiroFutila\LaravelBackupPulse\Recorders;

use Laravel\Pulse\Events\SharedBeat;
use Laravel\Pulse\Facades\Pulse;
use MonteiroFutila\LaravelBackupPulse\SpatieLaravelBackup;

class LaravelBackupPulseRecorder
{
    public array $listen = [
        SharedBeat::class,
    ];

    public function record(SharedBeat $event): void
    {
        if ($event->time->minute % 10 !== 0) {
            return;
        }

        Pulse::set('backups', 'backup-statuses', json_encode(SpatieLaravelBackup::getBackupDestinationStatusData()));

        Pulse::set('backups', 'files', json_encode(SpatieLaravelBackup::getAllBackupDestinationData()));
    }
}
