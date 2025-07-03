<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Artist extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'bio', 'photo'];

    // Generar el slug automáticamente
    public static function boot()
    {
        parent::boot();

        static::creating(function ($artist) {
            $artist->slug = Str::slug($artist->name);
        });
    }
    public function images()
    {
        return $this->morphMany(\App\Models\Image::class, 'imageable');
    }
}
