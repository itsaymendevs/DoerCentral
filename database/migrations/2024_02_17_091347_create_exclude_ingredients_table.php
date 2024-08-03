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
        Schema::create('exclude_ingredients', function (Blueprint $table) {
            $table->id();


            // 1: ingredient - exclude
            $table->bigInteger('ingredientId')->unsigned()->nullable();
            $table->foreign('ingredientId')->references('id')->on('ingredients')->onDelete('cascade');

            $table->bigInteger('excludeId')->unsigned()->nullable();
            $table->foreign('excludeId')->references('id')->on('excludes')->onDelete('cascade');



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down() : void
    {
        Schema::dropIfExists('exclude_ingredients');
    }
};
