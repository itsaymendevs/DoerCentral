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
        Schema::create('ingredients', function (Blueprint $table) {
            $table->id();



            // :: migrationId
            $table->bigInteger('migrationId')->nullable();



            // 1: general
            $table->text('name')->nullable();
            $table->text('desc')->nullable();
            $table->text('usage')->nullable();
            $table->text('referenceID')->nullable();



            // 1.2: percentages %
            $table->double('increment', 15)->nullable();
            $table->double('decrement', 15)->nullable();
            $table->double('wastage', 15)->nullable();





            // 1.3: unitId - purchaseUnitId
            $table->bigInteger('unitId')->unsigned()->nullable();
            $table->foreign('unitId')->references('id')->on('units')->onDelete('set null');


            $table->bigInteger('purchaseUnitId')->unsigned()->nullable();
            $table->foreign('purchaseUnitId')->references('id')->on('units')->onDelete('set null');






            // 1.4: imageFile
            $table->text('imageFile')->nullable();




            // 1.5: category - group - exclude - allergy
            $table->bigInteger('categoryId')->unsigned()->nullable();
            $table->foreign('categoryId')->references('id')->on('ingredient_categories')->onDelete('set null');

            $table->bigInteger('groupId')->unsigned()->nullable();
            $table->foreign('groupId')->references('id')->on('ingredient_groups')->onDelete('set null');


            $table->bigInteger('excludeId')->unsigned()->nullable();
            $table->foreign('excludeId')->references('id')->on('excludes')->onDelete('set null');



            $table->bigInteger('allergyId')->unsigned()->nullable();
            $table->foreign('allergyId')->references('id')->on('allergies')->onDelete('set null');




            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down() : void
    {
        Schema::dropIfExists('ingredients');
    }
};
