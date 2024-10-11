<?php

namespace MonteiroFutila\LaravelBackupPulse\Livewire;

use Illuminate\Support\Facades\View;
use Laravel\Pulse\Facades\Pulse;
use Laravel\Pulse\Livewire\Card;

class Backups extends Card
{
    public function render()
    {
        $backups = Pulse::values('backups')->map(function ($backups, $key) {
            return json_decode($backups->value, JSON_THROW_ON_ERROR);
        });

        return View::make('laravel-backup-pulse::livewire.backups', [
            'backups' => $backups,
        ]);
    }
}
