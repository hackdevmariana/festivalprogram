<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Banner extends Model
{
    protected $fillable = ['name', 'slug', 'image_url', 'views_count'];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($banner) {
            $banner->slug = Str::slug($banner->name);
        });
    }
}
