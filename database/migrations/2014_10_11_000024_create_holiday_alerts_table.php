<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up() : void
    {
        Schema::create('holiday_alerts', function (Blueprint $table) {
            $table->id();


            // 1: general
            $table->string('weekday', 100)->nullable();
            $table->string('message', 255)->nullable();



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down() : void
    {
        Schema::dropIfExists('holiday_alerts');
    }
};
