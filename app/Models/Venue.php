<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Venue extends Model
{
    protected $fillable = ['name', 'slug', 'description', 'address', 'municipality_id', 'latitude', 'longitude', 'url', 'logo'];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($venue) {
            $venue->slug = Str::slug($venue->name);
        });
    }

    public function municipality()
    {
        return $this->belongsTo(Municipality::class);
    }
}
