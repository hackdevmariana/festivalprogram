<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStylesTable extends Migration
{
    public function up()
    {
        Schema::create('styles', function (Blueprint $table) {
            $table->id(); // Crea el campo id auto incremental
            $table->string('name'); // Nombre del estilo
            $table->string('slug')->unique(); // Slug único para cada estilo
            $table->timestamps(); // created_at y updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('styles');
    }
}
