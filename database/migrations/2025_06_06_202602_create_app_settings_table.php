<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppSettingsTable extends Migration
{
    public function up()
    {
        Schema::create('app_settings', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nombre de la aplicación
            $table->string('logo'); // Ruta al logotipo
            $table->string('slogan'); // Lema de la aplicación
            $table->string('domain'); // Dominio o URL principal
            $table->enum('copy_type', ['copyright', 'copyleft']); // Tipo de copyright o copyleft
            $table->string('developed_by'); // Quién desarrolló la aplicación
            $table->string('developed_url'); // URL del desarrollador o equipo
            $table->timestamps(); // Si quieres registrar las fechas de creación y actualización
        });
    }

    public function down()
    {
        Schema::dropIfExists('app_settings');
    }
}
