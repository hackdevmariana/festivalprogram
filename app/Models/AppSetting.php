<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AppSetting extends Model
{
    protected $fillable = [
        'name',
        'logo',
        'slogan',
        'domain',
        'copy_type', // Puede ser 'copyright' o 'copyleft'
        'developed_by',
        'developed_url',
        'company'
    ];

    // Si no se usan los campos 'created_at' y 'updated_at', podemos desactivarlos.
    public $timestamps = false;
}
