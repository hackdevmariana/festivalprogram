<?php 

namespace App\Helpers;

use App\Models\AppSetting;

class ConfigHelper
{
    public static function get($key)
    {
        // Recuperamos la configuración de la base de datos
        $setting = AppSetting::first();

        // Devolvemos el valor correspondiente o null si no se encuentra
        return $setting ? $setting->$key : null;
    }
}
