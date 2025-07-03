<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagesTable extends Migration
{
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->string('path'); // ruta o nombre de archivo
            $table->string('type')->nullable(); // 'poster', 'gallery', etc.
            $table->string('caption')->nullable(); // pie de foto, título
            $table->nullableMorphs('imageable'); // imageable_type + imageable_id
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('images');
    }
}
