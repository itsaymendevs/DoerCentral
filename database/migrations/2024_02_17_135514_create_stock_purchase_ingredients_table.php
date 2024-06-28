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
        Schema::create('stock_purchase_ingredients', function (Blueprint $table) {
            $table->id();


            // 1: general
            $table->double('buyPrice', 15)->nullable();
            $table->double('quantity', 15)->nullable();
            $table->double('receivedQuantity', 15)->nullable();



            // 1.2: includeWastage - remarks
            $table->string('remarks', 255)->nullable()->default(0);
            $table->boolean('includeWastage')->nullable()->default(0);





            // 1.3: unit
            $table->bigInteger('unitId')->unsigned()->nullable();
            $table->foreign('unitId')->references('id')->on('units')->onDelete('set null');




            // 1.4: ingredient - stockPurchase
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
        Schema::dropIfExists('stock_purchase_ingredients');
    }
};
