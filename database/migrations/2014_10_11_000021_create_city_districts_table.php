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
        Schema::create('city_districts', function (Blueprint $table) {
            $table->id();


            // 1: general
            $table->string('name', 255)->nullable();


            // 1.2: city
            $table->bigInteger('cityId')->unsigned()->nullable();
            $table->foreign('cityId')->references('id')->on('cities')->onDelete('cascade');



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down() : void
    {
        Schema::dropIfExists('city_districts');
    }
};
