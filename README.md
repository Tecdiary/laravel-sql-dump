# Dump Laravel Migrations to SQL File

[![Latest Version on Packagist](https://img.shields.io/packagist/v/tecdiary/laravel-sql-dump.svg?style=flat-square)](https://packagist.org/packages/tecdiary/laravel-sql-dump)
[![Total Downloads](https://img.shields.io/packagist/dt/tecdiary/laravel-sql-dump.svg?style=flat-square)](https://packagist.org/packages/tecdiary/laravel-sql-dump)

This package reads your laravel migrations and dump them to the sql file.

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
php artisan migrate:dump      // On query per line - no formatting

php artisan migrate:dump --format   // -F|--format > Format queries before saving to file

php artisan migrate:dump --format --path=path/to/the/migrations/folder   // -P|--path => Set the migrations path if it's not default
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
