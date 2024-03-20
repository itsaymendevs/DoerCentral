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
        Schema::create('customer_delivery_days', function (Blueprint $table) {
            $table->id();



            // 1: general
            $table->string('weekDay', 100)->nullable();




            // 1.2: customer - customerAddress
            $table->bigInteger('customerAddressId')->unsigned()->nullable();
            $table->foreign('customerAddressId')->references('id')->on('customer_addresses')->onDelete('set null');


            $table->bigInteger('customerId')->unsigned()->nullable();
            $table->foreign('customerId')->references('id')->on('customers')->onDelete('cascade');



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down() : void
    {
        Schema::dropIfExists('customer_delivery_days');
    }
};
