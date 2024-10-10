<?php

namespace MonteiroFutila\PulseSpatieLaravelBackup\Livewire;

use Illuminate\Support\Facades\View;
use Laravel\Pulse\Facades\Pulse;
use Laravel\Pulse\Livewire\Card;

class Backups extends Card
{
    public function render()
    {
        $backup = Pulse::values('backups')->map(function ($backup, $key) {
            return json_decode($backup->value, JSON_THROW_ON_ERROR);
        });

        return View::make('pulse-backup::livewire.backup', [
            'backup' => $backup,
        ]);
    }
}
