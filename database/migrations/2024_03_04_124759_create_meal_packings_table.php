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
        Schema::create('meal_packings', function (Blueprint $table) {
            $table->id();


            // 1: general - macros
            $table->string('name', 255)->nullable();
            $table->double('amount', 15)->nullable()->default(0);
            $table->string('remarks', 255)->nullable();



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
        Schema::dropIfExists('meal_packings');
    }
};
