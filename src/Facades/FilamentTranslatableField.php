<?php

namespace _34ML\FilamentTranslatableField\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \_34ML\FilamentTranslatableField\FilamentTranslatableField
 */
class FilamentTranslatableField extends Facade
{
    /*
     * @codeCoverageIgnore
     */
    protected static function getFacadeAccessor()
    {
        return \_34ML\FilamentTranslatableField\FilamentTranslatableField::class;
    }
}
