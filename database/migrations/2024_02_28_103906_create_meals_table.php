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
        Schema::create('meals', function (Blueprint $table) {
            $table->id();


            // 1: general - type
            $table->bigInteger('typeId')->unsigned()->nullable();
            $table->foreign('typeId')->references('id')->on('types')->onDelete('cascade');





            // 1.2: name - generalName - servingPrice - validity
            $table->text('name')->nullable();

            $table->text('generalName')->nullable();
            $table->double('servingPrice', 15, 2)->nullable()->default(0);
            $table->integer('validity')->nullable()->default(0);





            // :: onlyForItems (snack - sauce - drink)
            $table->string('partType', 255)->nullable();




            // 1.3: isVegetarian / description
            $table->boolean('isVegetarian')->nullable();
            $table->text('desc')->nullable();





            // 1.4: imageFiles
            $table->text('imageFile')->nullable();
            $table->text('secondImageFile')->nullable();
            $table->text('thirdImageFile')->nullable();
            $table->text('fourthImageFile')->nullable();








            // 1.4: container
            $table->bigInteger('containerId')->unsigned()->nullable();
            $table->foreign('containerId')->references('id')->on('containers')->onDelete('set null');





            // 1.5: kitchenType - diet - cuisine
            $table->bigInteger('kitchenTypeId')->unsigned()->nullable();
            $table->foreign('kitchenTypeId')->references('id')->on('kitchen_types')->onDelete('set null');



            $table->bigInteger('dietId')->unsigned()->nullable();
            $table->foreign('dietId')->references('id')->on('diets')->onDelete('set null');


            $table->bigInteger('cuisineId')->unsigned()->nullable();
            $table->foreign('cuisineId')->references('id')->on('cuisines')->onDelete('set null');



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down() : void
    {
        Schema::dropIfExists('meals');
    }
};
