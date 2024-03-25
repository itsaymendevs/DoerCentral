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
        Schema::create('meal_parts', function (Blueprint $table) {
            $table->id();



            // 1: general
            $table->bigInteger('partId')->unsigned()->nullable();
            $table->foreign('partId')->references('id')->on('meals')->onDelete('cascade');

            $table->bigInteger('typeId')->unsigned()->nullable();
            $table->foreign('typeId')->references('id')->on('types')->onDelete('cascade');




            $table->string('partType', 100)->nullable();
            $table->double('amount', 15)->nullable()->default(0);
            $table->string('remarks', 255)->nullable();




            // 1.2: groupToken - isRemovable
            $table->string('groupToken', 100)->nullable();
            $table->boolean('isRemovable')->nullable()->default(0);
            $table->boolean('isReplacement')->nullable()->default(0);




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
        Schema::dropIfExists('meal_parts');
    }
};
