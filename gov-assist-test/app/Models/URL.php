<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class URL extends Model
{
    use HasFactory;
    protected $fillable = ['destination', 'slug', 'views'];

    // Accessor for shortened_url field
    public function getShortenedUrlAttribute(){
        return "http://url-shortener.test/".$this->attributes['slug'];
    }
}
