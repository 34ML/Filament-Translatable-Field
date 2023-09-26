<?php

namespace _34ML\FilamentTranslatableField\Forms\Components;

use Filament\Forms\Components\Field;

class LanguageSelector extends Field
{
    protected string $view = 'filament-translatable-field::forms.components.language-selector';

    public static function make($name = ''): static
    {
        return parent::make(config('filament-translatable-field.select_translation_field_name', 'select_language'))
            ->formatStateUsing(fn ($state) => is_null($state) ? array_keys(config('filament-translatable-field.locales'))[0] ?? 'en' : $state);
    }

    public function getAvailableLanguages()
    {
        return config('filament-translatable-field.locales');
    }
}
