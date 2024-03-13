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
        Schema::create('plan_bundle_range_meals', function (Blueprint $table) {
            $table->id();


            // 1: general
            $table->double('price', 15)->nullable()->default(0);
            $table->double('calories', 15)->nullable()->default(0);



            // 1.2: mealType - size
            $table->bigInteger('sizeId')->unsigned()->nullable();
            $table->foreign('sizeId')->references('id')->on('sizes')->onDelete('cascade');

            $table->bigInteger('mealTypeId')->unsigned()->nullable();
            $table->foreign('mealTypeId')->references('id')->on('meal_types')->onDelete('cascade');




            // 1: bundleRangeId
            $table->bigInteger('planBundleRangeId')->unsigned()->nullable();
            $table->foreign('planBundleRangeId')->references('id')->on('plan_bundle_ranges')->onDelete('cascade');



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down() : void
    {
        Schema::dropIfExists('plan_bundle_range_meals');
    }
};
