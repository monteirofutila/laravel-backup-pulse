<?php

namespace MonteiroFutila\PulseSpatieLaravelBackup\Recorders;

use Laravel\Pulse\Events\SharedBeat;
use Laravel\Pulse\Facades\Pulse;
use MonteiroFutila\PulseSpatieLaravelBackup\PulseSpatieLaravelBackup;

class PulseSpatieLaravelBackupRecorder
{
    public array $listen = [
        SharedBeat::class
    ];

    public function record(SharedBeat $event): void
    {
        if ($event->time->minute % 15 !== 0) {
            return;
        }

        Pulse::set('backups', 'backup-statuses', json_encode(PulseSpatieLaravelBackup::getBackupDestinationStatusData()));

        $backups = [];

        foreach (PulseSpatieLaravelBackup::getDisks() as $disk) {
            $backups = array_merge($backups, PulseSpatieLaravelBackup::getBackupDestinationData($disk));
        }

        Pulse::set('backups', 'backups', json_encode($backups));
    }
}
