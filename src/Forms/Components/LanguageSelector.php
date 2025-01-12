<?php

namespace _34ML\FilamentTranslatableField\Forms\Components;

use Filament\Forms\Components\Component;
use Filament\Forms\Components\Field;
use Illuminate\Contracts\Support\Htmlable;

class LanguageSelector extends Field
{
    protected string $view = 'filament-translatable-field::forms.components.language-selector';

    protected string|Htmlable|\Closure|null $label = '';

    public static function make($name = ''): static
    {
        return parent::make(config('filament-translatable-field.select_translation_field_name', 'select_language'))
            ->formatStateUsing(fn ($state) => is_null($state) ? self::getAvailableLanguages()[0] ?? 'en' : $state)
            ->live()
            ->default(self::getAvailableLanguages()[0] ?? 'en')
            ->dehydrated(false)
            ->hidden(self::thereIsOnlyOneLanguage())
            ->beforeStateDehydrated(function ($state, Component $component) {
                $components = $component->getContainer()->getComponents(true);
                foreach ($components as $component) {
                    if ($component->isHidden()) {
                        $component->hidden(false);
                    }
                }
            })
            ->columnSpan('full');
    }

    public static function getAvailableLanguages()
    {
        return config('filament-translatable-field.locales');
    }

    public static function thereIsOnlyOneLanguage()
    {
        return count(self::getAvailableLanguages()) <= 1;
    }
}
