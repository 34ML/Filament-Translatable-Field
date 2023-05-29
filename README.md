# A laravel filament field that handels translation 

[![Latest Version on Packagist](https://img.shields.io/packagist/v/34ml/filament-translatable-field.svg?style=flat-square)](https://packagist.org/packages/34ml/filament-translatable-field)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/34ml/filament-translatable-field/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/34ml/filament-translatable-field/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/34ml/filament-translatable-field/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/34ml/filament-translatable-field/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/34ml/filament-translatable-field.svg?style=flat-square)](https://packagist.org/packages/34ml/filament-translatable-field)

This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Support us

[<img src="https://github-ads.s3.eu-central-1.amazonaws.com/Filament-Translatable-Field.jpg?t=1" width="419px" />](https://spatie.be/github-ad-click/Filament-Translatable-Field)

We invest a lot of resources into creating [best in class open source packages](https://spatie.be/open-source). You can support us by [buying one of our paid products](https://spatie.be/open-source/support-us).

We highly appreciate you sending us a postcard from your hometown, mentioning which of our package(s) you are using. You'll find our address on [our contact page](https://spatie.be/about-us). We publish all received postcards on [our virtual postcard wall](https://spatie.be/open-source/postcards).

## Installation

You can install the package via composer:

```bash
composer require 34ml/filament-translatable-field
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="filament-translatable-field-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="filament-translatable-field-config"
```

This is the contents of the published config file:

```php
return [
];
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="filament-translatable-field-views"
```

## Usage

```php
$filamentTranslatableField = new 34ML\FilamentTranslatableField();
echo $filamentTranslatableField->echoPhrase('Hello, 34ML!');
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

- [Mostafa Hassan](https://github.com/MostafaHassan1)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
