<?php

namespace _34ML\FilamentTranslatableField\Tests;

use _34ML\FilamentTranslatableField\FilamentTranslatableFieldServiceProvider;
use Filament\FilamentServiceProvider;
use Filament\Forms\FormsServiceProvider;
use Filament\Support\SupportServiceProvider;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\View;
use Livewire\LivewireServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');

        View::addLocation(__DIR__ . '/Fixtures/resources/views');

        (include __DIR__ . '/Fixtures/Migrations/create_post_table.php')->up();
    }

    protected function getPackageProviders($app)
    {
        return [
            FilamentTranslatableFieldServiceProvider::class,
            LivewireServiceProvider::class,
            FilamentServiceProvider::class,
            FormsServiceProvider::class,
            SupportServiceProvider::class,
        ];
    }

    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => '_34ML\\FilamentTranslatableField\\Database\\Factories\\' . class_basename($modelName) . 'Factory'
        );

        View::share('errors', new \Illuminate\Support\ViewErrorBag());
    }
}
