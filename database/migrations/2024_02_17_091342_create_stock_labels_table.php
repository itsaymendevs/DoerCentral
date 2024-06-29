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
        Schema::create('stock_labels', function (Blueprint $table) {
            $table->id();


            // 1: general
            $table->double('buyPrice', 15)->nullable();
            $table->double('availableQuantity', 15)->nullable();



            // 1.2: label - stockPurchase
            $table->bigInteger('labelId')->unsigned()->nullable();
            $table->foreign('labelId')->references('id')->on('labels')->onDelete('cascade');


            $table->bigInteger('stockItemPurchaseId')->unsigned()->nullable();
            $table->foreign('stockItemPurchaseId')->references('id')->on('stock_item_purchases')->onDelete('cascade');


            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down() : void
    {
        Schema::dropIfExists('stock_labels');
    }
};
