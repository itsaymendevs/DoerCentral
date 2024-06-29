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
        Schema::create('vendor_items', function (Blueprint $table) {
            $table->id();

            // 1: general
            $table->double('sellPrice', 15)->nullable();



            // 1.2: unit - item - vendor
            $table->bigInteger('unitId')->unsigned()->nullable();
            $table->foreign('unitId')->references('id')->on('units')->onDelete('set null');


            $table->bigInteger('itemId')->unsigned()->nullable();
            $table->foreign('itemId')->references('id')->on('items')->onDelete('cascade');


            $table->bigInteger('vendorId')->unsigned()->nullable();
            $table->foreign('vendorId')->references('id')->on('vendors')->onDelete('cascade');



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down() : void
    {
        Schema::dropIfExists('vendor_items');
    }
};
