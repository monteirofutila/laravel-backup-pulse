<?php

namespace MonteiroFutila\LaravelBackupPulse;

use Illuminate\Support\Facades\Cache;
use Spatie\Backup\BackupDestination\Backup;
use Spatie\Backup\BackupDestination\BackupDestination;
use Spatie\Backup\Helpers\Format;
use Spatie\Backup\Tasks\Monitor\BackupDestinationStatus;
use Spatie\Backup\Tasks\Monitor\BackupDestinationStatusFactory;

class SpatieLaravelBackup
{
    public static function getDisks(): array
    {
        return config('backup.backup.destination.disks');
    }

    public static function getDisk(): string
    {
        $defaultDisks = static::getDisks();

        return request('tableFilters.disk.value', reset($defaultDisks));
    }

    public static function getFilterDisks(): array
    {
        $result = [];

        foreach (static::getDisks() as $value) {
            $result[$value] = ucfirst($value);
        }

        return $result;
    }

    public static function getAllBackupDestinationData(): array
    {
        return Cache::remember('backup-files', now()->addSeconds(30), function () {
            $data = [];

            foreach (self::getDisks() as $disk) {
                $data = array_merge($data, self::getBackupDestinationData($disk));
            }

            return $data;
        });
    }

    public static function getBackupDestinationData(string $disk): array
    {
        return BackupDestination::create($disk, config('backup.backup.name'))
            ->backups()
            ->map(function (Backup $backup) use ($disk) {
                return [
                    'disk' => $disk,
                    'path' => $backup->path(),
                    'date' => $backup->date()->format('Y-m-d H:i:s'),
                    'size' => Format::humanReadableSize($backup->sizeInBytes()),
                ];
            })
            ->toArray();
    }

    public static function getBackupDestinationStatusData(): array
    {
        return Cache::remember('backup-statuses', now()->addSeconds(30), function () {
            return BackupDestinationStatusFactory::createForMonitorConfig(config('backup.monitor_backups'))
                ->map(function (BackupDestinationStatus $backupDestinationStatus, int|string $key) {
                    return [
                        'id' => $key,
                        'name' => $backupDestinationStatus->backupDestination()->backupName(),
                        'disk' => $backupDestinationStatus->backupDestination()->diskName(),
                        'reachable' => $backupDestinationStatus->backupDestination()->isReachable(),
                        'healthy' => $backupDestinationStatus->isHealthy(),
                        'amount' => $backupDestinationStatus->backupDestination()->backups()->count(),
                        'newest' => $backupDestinationStatus->backupDestination()->newestBackup()
                            ? $backupDestinationStatus->backupDestination()->newestBackup()->date()->diffForHumans()
                            : __('No backups present'),
                        'usedStorage' => Format::humanReadableSize($backupDestinationStatus->backupDestination()->usedStorage()),
                    ];
                })
                ->values()
                ->toArray();
        });
    }
}
