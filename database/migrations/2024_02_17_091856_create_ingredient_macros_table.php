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
        Schema::create('ingredient_macros', function (Blueprint $table) {

            $table->id();

            // 1: general
            $table->string('ingredientType', 100)->nullable()->default('Fresh');


            // 1.2: macros
            $table->double('calories', 15)->nullable()->default(0);
            $table->double('proteins', 15)->nullable()->default(0);
            $table->double('carbs', 15)->nullable()->default(0);
            $table->double('fats', 15)->nullable()->default(0);

            $table->double('cholesterol', 15)->nullable()->default(0);
            $table->double('sodium', 15)->nullable()->default(0);
            $table->double('fiber', 15)->nullable()->default(0);
            $table->double('sugar', 15)->nullable()->default(0);
            $table->double('calcium', 15)->nullable()->default(0);
            $table->double('iron', 15)->nullable()->default(0);

            $table->double('vitaminA', 15)->nullable()->default(0);
            $table->double('vitaminC', 15)->nullable()->default(0);




            // 1.3: ingredient
            $table->bigInteger('ingredientId')->unsigned()->nullable();
            $table->foreign('ingredientId')->references('id')->on('ingredients')->onDelete('cascade');



            $table->timestamps();


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down() : void
    {
        Schema::dropIfExists('ingredient_macros');
    }
};
