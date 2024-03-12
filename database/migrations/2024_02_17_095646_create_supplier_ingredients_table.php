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
        Schema::create('supplier_ingredients', function (Blueprint $table) {
            $table->id();

            // 1: general
            $table->double('sellPrice', 15)->nullable();



            // 1.2: unit - ingredient - supplier
            $table->bigInteger('unitId')->unsigned()->nullable();
            $table->foreign('unitId')->references('id')->on('units')->onDelete('set null');


            $table->bigInteger('ingredientId')->unsigned()->nullable();
            $table->foreign('ingredientId')->references('id')->on('ingredients')->onDelete('cascade');


            $table->bigInteger('supplierId')->unsigned()->nullable();
            $table->foreign('supplierId')->references('id')->on('suppliers')->onDelete('cascade');


            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down() : void
    {
        Schema::dropIfExists('supplier_ingredients');
    }
};
