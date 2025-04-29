<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('gamepad', function (Blueprint $table) {
            $table->id('gamepad_id');
            $table->string('gamepad_name');
            $table->string('platform');
            $table->decimal('price', 10, 2);
            $table->string('gamepad_image')->nullable();
            $table->timestamps();
        });
    }

};