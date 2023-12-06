<?php

namespace _34ML\FilamentTranslatableField\Forms\Components;

use Closure;
use Filament\Forms\Components\Component;
use Filament\Forms\Components\Field;
use Illuminate\Contracts\Support\Htmlable;

class LanguageSelector extends Field
{
    protected string $view = 'filament-translatable-field::forms.components.language-selector';

    protected string|Htmlable|Closure|null $label = '';

    public static function make($name = ''): static
    {
        return parent::make(config('filament-translatable-field.select_translation_field_name', 'select_language'))
            ->formatStateUsing(fn ($state) => is_null($state) ? array_keys(config('filament-translatable-field.locales'))[0] ?? 'en' : $state)
            ->live()
            ->default(array_keys(config('filament-translatable-field.locales'))[0] ?? 'en')
            ->dehydrated(false)
            ->beforeStateDehydrated(function($state,Component $component) {
                $components = $component->getContainer()->getComponents(true);
                foreach ($components as $component) {
                    if($component->isHidden())
                        $component->hidden(false);
                }
            })
            ->columnSpan('full');
    }

    public function getAvailableLanguages()
    {
        return config('filament-translatable-field.locales');
    }
}
