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
        Schema::create('stock_item_purchase_items', function (Blueprint $table) {
            $table->id();



            // 1: general
            $table->double('buyPrice', 15)->nullable();
            $table->double('quantity', 15)->nullable();
            $table->double('receivedQuantity', 15)->nullable();
            $table->string('remarks', 255)->nullable();





            // 1.3: unit
            $table->bigInteger('unitId')->unsigned()->nullable();
            $table->foreign('unitId')->references('id')->on('units')->onDelete('set null');




            // 1.4: item - stockPurchase
            $table->bigInteger('itemId')->unsigned()->nullable();
            $table->foreign('itemId')->references('id')->on('items')->onDelete('cascade');


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
        Schema::dropIfExists('stock_item_purchase_items');
    }
};
