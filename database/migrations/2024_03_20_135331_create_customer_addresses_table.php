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
        Schema::create('customer_addresses', function (Blueprint $table) {
            $table->id();



            // 1: general
            $table->text('locationAddress')->nullable();

            $table->string('floor', 255)->nullable();
            $table->string('apartment', 255)->nullable();



            // 1.2: city - district - deliveryTime
            $table->bigInteger('cityId')->unsigned()->nullable();
            $table->foreign('cityId')->references('id')->on('cities')->onDelete('set null');


            $table->bigInteger('cityDistrictId')->unsigned()->nullable();
            $table->foreign('cityDistrictId')->references('id')->on('city_districts')->onDelete('set null');


            $table->bigInteger('deliveryTimeId')->unsigned()->nullable();
            $table->foreign('deliveryTimeId')->references('id')->on('city_delivery_times')->onDelete('set null');






            // 1.3: isActive
            $table->boolean('isActive')->nullable()->default(1);





            // 1.4: customer
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
        Schema::dropIfExists('customer_addresses');
    }
};
