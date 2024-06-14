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
        Schema::create('supplier_categories', function (Blueprint $table) {
            $table->id();



            // 1: category - supplier
            $table->bigInteger('categoryId')->unsigned()->nullable();
            $table->foreign('categoryId')->references('id')->on('ingredient_categories')->onDelete('cascade');


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
        Schema::dropIfExists('supplier_categories');
    }
};
