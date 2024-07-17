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
        Schema::create('meal_ingredients', function (Blueprint $table) {
            $table->id();


            // 1: general
            $table->bigInteger('ingredientId')->unsigned()->nullable();
            $table->foreign('ingredientId')->references('id')->on('ingredients')->onDelete('cascade');




            // 1.2: brand - cookingType
            $table->bigInteger('ingredientBrandId')->unsigned()->nullable();
            $table->foreign('ingredientBrandId')->references('id')->on('ingredient_macros')->onDelete('set null');


            $table->bigInteger('cookingTypeId')->unsigned()->nullable();
            $table->foreign('cookingTypeId')->references('id')->on('cooking_types')->onDelete('set null');






            // 1.3: partType - amount - remarks
            $table->string('partType', 100)->nullable();
            $table->double('amount', 15)->nullable()->default(0);
            $table->string('remarks', 255)->nullable();

            $table->string('groupToken', 100)->nullable();
            $table->boolean('isRemovable')->nullable()->default(0);
            $table->boolean('isDefault')->nullable()->default(0);




            // 1.4: meal - size
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
        Schema::dropIfExists('meal_ingredients');
    }
};
