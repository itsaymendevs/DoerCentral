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
        Schema::create('vehicle_promotions', function (Blueprint $table) {
            $table->id();




            // 1: general
            $table->text('promotionURL')->nullable();
            $table->double('width', 15)->nullable();
            $table->double('height', 15)->nullable();




            // 1.2: vehicle
            $table->bigInteger('vehicleId')->unsigned()->nullable();
            $table->foreign('vehicleId')->references('id')->on('vehicles')->onDelete('cascade');



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down() : void
    {
        Schema::dropIfExists('vehicle_promotions');
    }
};
