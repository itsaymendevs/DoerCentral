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
        Schema::create('conversion_ingredients', function (Blueprint $table) {
            $table->id();



            // 1: general
            $table->double('conversionValue', 15)->unsigned()->nullable()->default(1);




            // 2: ingredient - conversion
            $table->bigInteger('ingredientId')->unsigned()->nullable();
            $table->foreign('ingredientId')->references('id')->on('ingredients')->onDelete('cascade');


            $table->bigInteger('conversionId')->unsigned()->nullable();
            $table->foreign('conversionId')->references('id')->on('conversions')->onDelete('cascade');



            $table->bigInteger('cookingTypeId')->unsigned()->nullable();
            $table->foreign('cookingTypeId')->references('id')->on('cooking_types')->onDelete('cascade');







            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down() : void
    {
        Schema::dropIfExists('conversion_ingredients');
    }
};
