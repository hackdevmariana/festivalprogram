<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->enum('event_mode', ['presential', 'online', 'hybrid'])->default('presential')->after('venue_id');
            $table->string('online_url')->nullable()->after('event_mode');
        });
    }

    public function down()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->dropColumn(['event_mode', 'online_url']);
        });
    }
};
