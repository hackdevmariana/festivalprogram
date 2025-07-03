<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class EventGroup extends Model
{
    protected $fillable = ['name', 'slug', 'description', 'url', 'poster'];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($eventGroup) {
            $eventGroup->slug = Str::slug($eventGroup->name);
        });
    }

    public function events()
    {
        return $this->hasMany(Event::class);
    }
    public function municipalities()
    {
        return $this->belongsToMany(Municipality::class);
    }

    public function images()
    {
        return $this->morphMany(\App\Models\Image::class, 'imageable');
    }
}
