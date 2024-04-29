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
        Schema::create('meal_serving_instructions', function (Blueprint $table) {
            $table->id();



            // 1: general
            $table->boolean('isActive')->nullable()->default(0);

            $table->bigInteger('servingInstructionId')->unsigned()->nullable();
            $table->foreign('servingInstructionId')->references('id')->on('serving_instructions')->onDelete('cascade');








            // 1.2: meal
            $table->bigInteger('mealId')->unsigned()->nullable();
            $table->foreign('mealId')->references('id')->on('meals')->onDelete('cascade');





            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down() : void
    {
        Schema::dropIfExists('meal_instruction_tags');
    }
};
