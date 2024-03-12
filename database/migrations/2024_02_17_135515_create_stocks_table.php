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
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();


            // 1: general
            $table->double('buyPrice', 15)->nullable();
            $table->double('availableQuantity', 15)->nullable();



            // 1.2: ingredient - stockPurchase
            $table->bigInteger('ingredientId')->unsigned()->nullable();
            $table->foreign('ingredientId')->references('id')->on('ingredients')->onDelete('cascade');


            $table->bigInteger('stockPurchaseId')->unsigned()->nullable();
            $table->foreign('stockPurchaseId')->references('id')->on('stock_purchases')->onDelete('cascade');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down() : void
    {
        Schema::dropIfExists('stocks');
    }
};
