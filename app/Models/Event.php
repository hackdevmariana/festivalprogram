<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Event extends Model
{
    protected $fillable = ['title', 'slug', 'description', 'municipality_id', 'start_datetime', 'end_date', 'url', 'poster', 'venue_id', 'price'];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($event) {
            $event->slug = Str::slug($event->title);
        });
    }

    public function municipality()
    {
        return $this->belongsTo(Municipality::class);
    }

    public function venue()
    {
        return $this->belongsTo(Venue::class);
    }

    public function eventGroup()
    {
        return $this->belongsTo(EventGroup::class);
    }

    public function images()
    {
        return $this->morphMany(\App\Models\Image::class, 'imageable');
    }
}
