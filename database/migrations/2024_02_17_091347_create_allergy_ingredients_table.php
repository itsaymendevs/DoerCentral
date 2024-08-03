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
        Schema::create('allergy_ingredients', function (Blueprint $table) {
            $table->id();



            // 1: ingredient - allergy
            $table->bigInteger('ingredientId')->unsigned()->nullable();
            $table->foreign('ingredientId')->references('id')->on('ingredients')->onDelete('cascade');

            $table->bigInteger('allergyId')->unsigned()->nullable();
            $table->foreign('allergyId')->references('id')->on('allergies')->onDelete('cascade');





            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down() : void
    {
        Schema::dropIfExists('allergy_ingredients');
    }
};
