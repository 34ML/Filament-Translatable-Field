<?php

namespace _34ML\FilamentTranslatableField;

use Filament\Forms\Components\Field;
use Illuminate\Database\Eloquent\Model;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Spatie\Translatable\HasTranslations;

class FilamentTranslatableFieldServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('filament-translatable-field')
            ->hasConfigFile()
            ->hasViews();
    }
}
