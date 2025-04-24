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
        Schema::table('gamepad', function (Blueprint $table) {
            $table->string('gamepad_image')->nullable(); // Add the image path column
        });
    }

    public function down()
    {
        Schema::table('gamepad', function (Blueprint $table) {
            $table->dropColumn('gamepad_image');
        });
    }
};
