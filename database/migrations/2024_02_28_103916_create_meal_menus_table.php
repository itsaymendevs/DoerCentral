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
        Schema::create('meal_menus', function (Blueprint $table) {
            $table->id();


            // 1: meal - menu
            $table->bigInteger('mealId')->unsigned()->nullable();
            $table->foreign('mealId')->references('id')->on('meals')->onDelete('cascade');

            $table->bigInteger('menuId')->unsigned()->nullable();
            $table->foreign('menuId')->references('id')->on('menus')->onDelete('cascade');




            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down() : void
    {
        Schema::dropIfExists('meal_menus');
    }
};
