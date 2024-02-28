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
        Schema::create('meal_sauces', function (Blueprint $table) {
            $table->id();

            // 1: general
            $table->bigInteger('sauceId')->unsigned()->nullable();
            $table->foreign('sauceId')->references('id')->on('meals')->onDelete('cascade');


            $table->double('amount', 15, 2)->nullable()->default(0);
            $table->string('remarks', 255)->nullable();







            // 1.3: meal - size
            $table->bigInteger('mealId')->unsigned()->nullable();
            $table->foreign('mealId')->references('id')->on('meals')->onDelete('cascade');

            $table->bigInteger('mealSizeId')->unsigned()->nullable();
            $table->foreign('mealSizeId')->references('id')->on('meal_sizes')->onDelete('cascade');



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down() : void
    {
        Schema::dropIfExists('meal_sauces');
    }
};
