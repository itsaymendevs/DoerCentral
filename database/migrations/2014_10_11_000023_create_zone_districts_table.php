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
        Schema::create('zone_districts', function (Blueprint $table) {
            $table->id();

            // 1: zone - district
            $table->bigInteger('zoneId')->unsigned()->nullable();
            $table->foreign('zoneId')->references('id')->on('zones')->onDelete('cascade');

            $table->bigInteger('cityDistrictId')->unsigned()->nullable();
            $table->foreign('cityDistrictId')->references('id')->on('city_districts')->onDelete('cascade');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down() : void
    {
        Schema::dropIfExists('zone_districts');
    }
};
