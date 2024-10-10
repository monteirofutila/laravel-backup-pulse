# Pulse Spatie Laravel Backup

[![Latest Version on Packagist](https://img.shields.io/packagist/v/:vendor_slug/:package_slug.svg?style=flat-square)](https://packagist.org/packages/:vendor_slug/:package_slug)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/:vendor_slug/:package_slug/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/:vendor_slug/:package_slug/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/:vendor_slug/:package_slug/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/:vendor_slug/:package_slug/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/:vendor_slug/:package_slug.svg?style=flat-square)](https://packagist.org/packages/:vendor_slug/:package_slug)

This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

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

Right now, the Composer dependencies will only be checked once per day. To run the checks you must add the PulseSpatieLaravelBackupRecorder to the pulse.php file.</p>

```diff
return [
    // ...
    
    'recorders' => [
+        \MonteiroFutila\PulseSpatieLaravelBackup\Recorders\PulseSpatieLaravelBackupRecorder::class => [],
    ]
]
```

You also need to be running the <a href="https://laravel.com/docs/10.x/pulse#dashboard-cards">pulse:check</a> command.

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
