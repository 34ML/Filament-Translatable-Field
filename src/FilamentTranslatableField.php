<?php

namespace _34ML\FilamentTranslatableField;

use Filament\Forms\Components\Field;
use Illuminate\Support\Str;

class FilamentTranslatableField
{
    public static function make(string $fieldName, string $fieldClass, string $fieldDisplayName = null, $callbacks = null): array
    {
        $locales = self::getLocales();
        self::checkIfValidFieldClass($fieldClass);
        $fields = [];
        foreach ($locales as $locale) {
            $field = $fieldClass::make("$fieldName.$locale")
                ->statePath("$fieldName.$locale")
                ->hidden(fn (\Closure $get) => ! is_null($get(self::getSelectLanguageFieldName())) && $get(self::getSelectLanguageFieldName()) != $locale);
            self::setFieldLabel($fieldDisplayName, $fieldName, $field, $locale);
            self::processCallabacks($callbacks, $field);
            $fields[] = $field;
        }

        return $fields;
    }

    private static function getLocales()
    {
        $locales = array_keys(config('filament-translatable-field.locales'));

        if (count($locales) == 0) {
            throw new \Exception('Locales cannot be empty, please assign more locales via the filament translatable field config file');
        }

        return $locales;
    }

    private static function checkIfValidFieldClass(string $fieldClass)
    {
        if (is_subclass_of($fieldClass, Field::class)) {
            return;
        }

        throw new \Exception(`$fieldClass must extend `.Field::class);
    }

    public static function setFieldLabel(?string $fieldDisplayName, $fieldName, &$field, mixed $locale): void
    {
        if ($fieldDisplayName != null) {
            $field->label(Str::title("$fieldDisplayName $locale"));
        } else {
            $field->label(Str::title("$fieldName $locale"));
        }
    }

    /**
     * @return mixed
     */
    public static function processCallabacks(mixed $callbacks, &$field)
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
