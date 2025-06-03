<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('regions', function (Blueprint $table) {
            $table->string('flag')->nullable(); // Bandera oficial (rectangular)
            $table->string('button_flag')->nullable(); // Bandera para botones (redonda)
        });
    }

    public function down()
    {
        Schema::table('regions', function (Blueprint $table) {
            $table->dropColumn(['flag', 'button_flag']);
        });
    }
};
