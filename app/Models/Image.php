<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'path',
        'type',
        'caption',
    ];

    public function imageable()
    {
        return $this->morphTo();
    }
}
