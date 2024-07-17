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
        Schema::create('meal_sizes', function (Blueprint $table) {
            $table->id();


            // 1: general - macros
            $table->double('afterCookGrams', 15)->nullable()->default(0);
            $table->double('afterCookCalories', 15)->nullable()->default(0);
            $table->double('afterCookProteins', 15)->nullable()->default(0);
            $table->double('afterCookCarbs', 15)->nullable()->default(0);
            $table->double('afterCookFats', 15)->nullable()->default(0);
            $table->double('afterCookCost', 15)->nullable()->default(0);




            // 1.2: price
            $table->double('price', 15)->nullable()->default(0);
            $table->double('yield', 15)->nullable()->default(0);



            // 1.3: servingDetails
            $table->double('numberOfServing', 15)->nullable();
            $table->double('totalServingGrams', 15)->nullable();
            $table->double('pricePerServing', 15)->nullable();
            $table->double('gramsPerServing', 15)->nullable();








            // 1.2: meal - size
            $table->bigInteger('mealId')->unsigned()->nullable();
            $table->foreign('mealId')->references('id')->on('meals')->onDelete('cascade');

            $table->bigInteger('sizeId')->unsigned()->nullable();
            $table->foreign('sizeId')->references('id')->on('sizes')->onDelete('cascade');






            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down() : void
    {
        Schema::dropIfExists('meal_sizes');
    }
};
