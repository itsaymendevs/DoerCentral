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
        Schema::create('driver_zones', function (Blueprint $table) {
            $table->id();


            // 1: driver - zone
            $table->bigInteger('driverId')->unsigned()->nullable();
            $table->foreign('driverId')->references('id')->on('drivers')->onDelete('cascade');

            $table->bigInteger('zoneId')->unsigned()->nullable();
            $table->foreign('zoneId')->references('id')->on('zones')->onDelete('cascade');



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down() : void
    {
        Schema::dropIfExists('driver_zones');
    }
};
