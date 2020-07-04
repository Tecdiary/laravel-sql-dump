# Dump Laravel Migrations to SQL File

[![Latest Version on Packagist](https://img.shields.io/packagist/v/tecdiary/laravel-sql-dump.svg?style=flat-square)](https://packagist.org/packages/tecdiary/laravel-sql-dump)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/tecdiary/laravel-sql-dump/run-tests?label=tests)](https://github.com/tecdiary/laravel-sql-dump/actions?query=workflow%3Arun-tests+branch%3Amaster)
[![Total Downloads](https://img.shields.io/packagist/dt/tecdiary/laravel-sql-dump.svg?style=flat-square)](https://packagist.org/packages/tecdiary/laravel-sql-dump)

This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Installation

You can install the package via composer:

```bash
composer require tecdiary/laravel-sql-dump
```

You can publish the config file with:

```bash
php artisan vendor:publish --provider="Tecdiary\LaravelSqlDump\LaravelSqlDumpServiceProvider" --tag="config"
```

This is the contents of the published config file:

```php
return [
    /**
     * Directory path to save sql dump
     */
    'directory' => base_path('dump'),
];
```

## Usage

```php
php artisan migrate:dump
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email saleem@tecdiary.com instead of using the issue tracker.

## Credits

-   [Mian Saleem](https://github.com/MianSaleem)
-   [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
