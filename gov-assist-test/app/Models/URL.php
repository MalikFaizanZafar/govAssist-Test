<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
class URL extends Model
{
    use HasFactory;
    protected $fillable = ['destination', 'slug', 'views'];

    // Accessor for shortened_url field
    protected function slug(): Attribute
    {
        $base_url = "http://url-shortener.test/";
        return Attribute::make(
            get: fn ($value) => $base_url.$value,
        );
    }
}
