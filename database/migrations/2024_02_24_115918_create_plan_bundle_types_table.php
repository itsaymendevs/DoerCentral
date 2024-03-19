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
        Schema::create('plan_bundle_types', function (Blueprint $table) {
            $table->id();


            $table->integer('quantity')->nullable()->default(0);



            // 1:  mealType - type - bundle
            $table->bigInteger('mealTypeId')->unsigned()->nullable();
            $table->foreign('mealTypeId')->references('id')->on('meal_types')->onDelete('cascade');


            $table->bigInteger('typeId')->unsigned()->nullable();
            $table->foreign('typeId')->references('id')->on('types')->onDelete('cascade');



            $table->bigInteger('planBundleId')->unsigned()->nullable();
            $table->foreign('planBundleId')->references('id')->on('plan_bundles')->onDelete('cascade');




            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down() : void
    {
        Schema::dropIfExists('plan_bundle_types');
    }
};
