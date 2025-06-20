<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $fillable = ['name', 'slug', 'flag', 'button_flag'];

    public function provinces()
    {
        return $this->hasMany(Province::class);
    }
}
