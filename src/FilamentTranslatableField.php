<?php

namespace _34ML\FilamentTranslatableField;

use Filament\Forms\Components\Component;
use Filament\Forms\Components\Field;
use Filament\Forms\Get;
use Illuminate\Support\Str;

class FilamentTranslatableField
{
    /**
     * @throws \Exception
     */
    public static function make(string $fieldName, string $fieldClass, string $fieldDisplayName = null, $callbacks = null): array
    {
        $locales = self::getLocales();
        self::checkIfValidFieldClass($fieldClass);
        $fields = [];
        foreach ($locales as $locale) {
            $field = $fieldClass::make("$fieldName.$locale")
                ->statePath("$fieldName.$locale")
                ->visible(function (Get $get) use($locale) {
                    return is_null($get(self::getSelectLanguageFieldName())) || $get(self::getSelectLanguageFieldName()) == $locale;
                })
                ->label(fn(Get $get) => self::getFieldLabel($get(self::getSelectLanguageFieldName()),$fieldName,$fieldDisplayName,$locale));
            self::processCallabacks($callbacks, $field);
            $fields[] = $field;
        }

        return $fields;
    }

    private static function getLocales(): array
    {
        $locales = array_keys(config('filament-translatable-field.locales'));

        if (count($locales) == 0) {
            throw new \Exception('Locales cannot be empty, please assign more locales via the filament translatable field config file', 500);
        }

        return $locales;
    }

    private static function checkIfValidFieldClass(string $fieldClass)
    {
        if (!is_subclass_of($fieldClass, Field::class)) {
            throw new \Exception(`$fieldClass must extend `.Field::class);
        }
    }

    public static function getFieldLabel(?string $selectLanguageFieldValue,string $fieldName, ?string $fieldDisplayName, string $locale): string
    {
        if(! is_null($selectLanguageFieldValue))
            return $fieldDisplayName ?? $fieldName;

        return $fieldDisplayName ? "$fieldDisplayName $locale" : "$fieldName $locale";
    }

    public static function processCallabacks(mixed $callbacks, &$field): void
    {
        if ($callbacks != null) {
            if (is_array($callbacks)) {
                foreach ($callbacks as $callback) {
                    if (is_callable($callback)) {
                        $field = $callback->call($field);
                    }
                }
            }
            if (is_callable($callbacks)) {
                $field = $callbacks->call($field);
            }
        }
    }

    private static function getSelectLanguageFieldName()
    {
        return config('filament-translatable-field.select_translation_field_name');
    }
}
