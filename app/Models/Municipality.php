<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Municipality extends Model
{
    protected $fillable = ['name', 'slug', 'province_id', 'latitude', 'longitude'];

    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function eventGroups()
    {
        return $this->belongsToMany(EventGroup::class);
    }
    public function images()
    {
        return $this->morphMany(\App\Models\Image::class, 'imageable');
    }
}
