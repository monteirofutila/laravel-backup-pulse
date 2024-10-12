<?php

namespace MonteiroFutila\LaravelBackupPulse\Livewire;

use Illuminate\Support\Facades\View;
use Laravel\Pulse\Facades\Pulse;
use Laravel\Pulse\Livewire\Card;
use Livewire\Attributes\Lazy;

class Backups extends Card
{
    #[Lazy]
    public function render()
    {
        $backups = Pulse::values('backups')->map(function ($backups, $key) {
            return json_decode($backups->value, associative: true, flags: JSON_THROW_ON_ERROR);
        })->toArray();

        return View::make('backup-pulse::livewire.backups', [
            'backups' => $backups,
        ]);
    }
}
