# A laravel filament field that handles translations

## Installation

You can install the package via composer:

```bash
composer require 34ml/filament-translatable-field
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="filament-translatable-field-config"
```

This is the contents of the published config file which the fields are created for each language listed here:

```php
return [
    'locales' => ['en','ar'],
];

```

## Usage
Just add the field in your resource, view, create,or edit pages inside the form function
```php
 ..._34ML\FilamentTranslatableField::make(
 'your_translatable_field_name',
 \Filament\Forms\Components\TextInput::class, // The field type class 
 'your_field_displayed_name', // Optional
// add your filament field functions as a callback 
// you can add it as one function
callbacks: function (){
    $this->required();
    $this->numeric();
    return $this; // You have to return the field or the callbacks won't work
}

// it also works as an array of different functions
callbacks: [
function(){
    return $this->required();
},
function(){
    return $this->numeric();
}
]);
```

## Credits

- [Mostafa Hassan](https://github.com/MostafaHassan1)
- [All Contributors](../../contributors)


