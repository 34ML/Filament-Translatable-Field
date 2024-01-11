<?php

namespace _34ML\FilamentTranslatableField\Tests\Fixtures\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Post extends Model
{
    use HasTranslations;

    protected $fillable = [
        'title',
    ];

    protected array $translatable = ['title'];
}
