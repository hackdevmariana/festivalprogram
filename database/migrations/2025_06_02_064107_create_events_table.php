<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->foreignId('municipality_id')->constrained()->onDelete('cascade'); // Municipio asociado
            $table->dateTime('start_datetime'); // Fecha y hora en un solo campo
            $table->date('end_date')->nullable(); // Fecha de finalización opcional
            $table->string('url')->nullable(); // Página del evento opcional
            $table->string('poster')->nullable(); // Imagen del evento
            $table->foreignId('venue_id')->nullable()->constrained()->onDelete('cascade'); // Relación con Venue
            $table->decimal('price', 8, 2)->nullable(); // Precio con precisión decimal
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
