<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $fillable = ['name', 'slug', 'region_id'];

    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function municipalities()
    {
        return $this->hasMany(Municipality::class);
    }
}
