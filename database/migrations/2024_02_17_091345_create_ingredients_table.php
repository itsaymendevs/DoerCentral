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


            // 1: general
            $table->text('name')->nullable();
            $table->text('desc')->nullable();
            $table->text('usage')->nullable();
            $table->text('referenceID')->nullable();



            // 1.2: percentages %
            $table->double('increment', 15)->nullable();
            $table->double('decrement', 15)->nullable();
            $table->double('wastage', 15)->nullable();







            // 1.3.5: unitId - purchaseUnitId
            $table->bigInteger('unitId')->unsigned()->nullable();
            $table->foreign('unitId')->references('id')->on('units')->onDelete('set null');


            $table->bigInteger('purchaseUnitId')->unsigned()->nullable();
            $table->foreign('purchaseUnitId')->references('id')->on('units')->onDelete('set null');






            // 1.4: imageFile
            $table->text('imageFile')->nullable();






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
