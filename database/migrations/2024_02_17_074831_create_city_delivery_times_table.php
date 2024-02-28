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
        Schema::create('city_delivery_times', function (Blueprint $table) {
            $table->id();


            // 1: general
            $table->string('title', 100)->nullable();
            $table->string('deliveryFrom', 100)->nullable();
            $table->string('deliveryUntil', 100)->nullable();



            // 1.2: isActive
            $table->boolean('isActive')->nullable()->default(1);


            // 1.3: city
            $table->bigInteger('cityId')->unsigned()->nullable();
            $table->foreign('cityId')->references('id')->on('cities')->onDelete('cascade');



            $table->timestamps();

        });
    } // end

    /**
     * Reverse the migrations.
     */
    public function down() : void
    {
        Schema::dropIfExists('city_delivery_times');
    }
};
