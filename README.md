# Pulse Backups

[![Latest Version on Packagist](https://img.shields.io/packagist/v/monteirofutila/pulse-spatie-laravel-backup.svg?style=flat-square)](https://packagist.org/packages/monteirofutila/pulse-spatie-laravel-backup)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/monteirofutila/pulse-spatie-laravel-backup/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/monteirofutila/pulse-spatie-laravel-backup/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/monteirofutila/pulse-spatie-laravel-backup/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/monteirofutila/pulse-spatie-laravel-backup/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/monteirofutila/pulse-spatie-laravel-backup.svg?style=flat-square)](https://packagist.org/packages/monteirofutila/pulse-spatie-laravel-backup)

A Laravel Pulse card to monitor the health of the backups, and show an overview of all backups managed by the  [Laravel-Backup](https://spatie.be/docs/laravel-backup/) package.

## Installation

You can install the package via composer:

```bash
composer require monteirofutila/pulse-spatie-laravel-backup
```

Next, you should publish the Pulse configuration and migration files using the vendor:publish Artisan command:

```bash
php artisan vendor:publish --provider="MonteiroFutila\PulseSpatieLaravelBackup\PulseSpatieLaravelBackupServiceProvider"
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="pulse-backup-views"
```

## Register the recorder

To run the checks you must add the PulseSpatieLaravelBackupRecorder to the pulse.php file.</p>

```diff
return [
    // ...
    
    'recorders' => [
+        \MonteiroFutila\PulseSpatieLaravelBackup\Recorders\PulseSpatieLaravelBackupRecorder::class => [],
    ]
]
```

You also need to be running the <a href="https://laravel.com/docs/10.x/pulse#dashboard-cards">pulse:check</a> command.

## Add to your dashboard

To add the card to the Pulse dashboard, you must first <a href="https://laravel.com/docs/10.x/pulse#dashboard-customization">publish the vendor view</a>

<p style="font-family: 'CustomFont';">Then, you can modify the dashboard.blade.php file: </p>

```diff
<x-pulse>

+    <livewire:backup cols='6' />

    <livewire:pulse.servers cols="full" />

    <livewire:pulse.usage cols="4" rows="2" />

    <livewire:pulse.queues cols="4" />

    <livewire:pulse.cache cols="4" />

    <livewire:pulse.slow-queries cols="8" />

    <livewire:pulse.exceptions cols="6" />

    <livewire:pulse.slow-requests cols="6" />

    <livewire:pulse.slow-jobs cols="6" />

    <livewire:pulse.slow-outgoing-requests cols="6" />

</x-pulse>
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Monteiro Futila](https://github.com/monteirofutila)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
