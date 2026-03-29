# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Overview

This is a Laravel/Filament package (`34ml/filament-translatable-field`) that integrates with [spatie/laravel-translatable](https://github.com/spatie/laravel-translatable) to provide translatable form fields in Filament v4. It requires PHP 8.3+, Laravel 12+, and Filament 4+.

## Commands

```bash
# Run tests
composer test
# or
./vendor/bin/pest

# Run a single test file
./vendor/bin/pest tests/TranslatableFieldTest.php

# Static analysis (PHPStan level 4)
composer analyse

# Format code (Laravel Pint)
composer format
```

> Note: `composer.json` scripts use `npm test` / `npm run analyse` / `npm run format` aliases — prefer the `composer` commands above.

## Architecture

### Core Flow

1. **`FilamentTranslatableField::make($fieldName, $fieldClass, $label, $callbacks)`** — the main entry point. Returns an array of Filament `Field` instances, one per configured locale. Spread these into a form schema with `...`.

2. Each generated field has its state path set to `fieldName.locale` (e.g., `title.en`, `title.ar`). Spatie's `HasTranslations` trait on the model handles reading/writing the underlying JSON column.

3. **`LanguageSelector`** (`src/Forms/Components/LanguageSelector.php`) — optional companion component. Renders tab-like UI; uses Livewire `live()` reactivity so fields for non-selected locales are hidden in real time. On dehydration it unhides all fields so all translations get saved.

4. Field visibility logic (inside `FilamentTranslatableField`): each field checks the `LanguageSelector`'s state via a Filament `Get` closure — if a language is selected, only that locale's field is visible; if none is selected, all fields show with locale-suffixed labels.

### Key Files

| File | Purpose |
|---|---|
| `src/FilamentTranslatableField.php` | Core static class; builds locale-specific field arrays |
| `src/Forms/Components/LanguageSelector.php` | Tab-style language picker component |
| `src/Facades/FilamentTranslatableField.php` | Facade for static access |
| `src/FilamentTranslatableFieldServiceProvider.php` | Registers config + views via Spatie Package Tools |
| `config/filament-translatable-field.php` | Locales map + selector field name |
| `resources/views/forms/components/language-selector.blade.php` | Blade/Alpine view for the selector UI |

### Configuration

Default config (`config/filament-translatable-field.php`):
```php
'locales' => ['en' => 'English', 'ar' => 'Arabic'],
'select_translation_field_name' => 'select_language',
```

### Tests

Tests live in `tests/` and use Pest. Fixtures in `tests/Fixtures/` include a `Post` model with `HasTranslations`, in-memory SQLite migrations, and Livewire `CreatePost`/`EditPost` components that wire up the full form stack for integration testing.

Architecture tests (`tests/ArchTest.php`) enforce no debug functions (`dd`, `dump`, `ray`) in source.
