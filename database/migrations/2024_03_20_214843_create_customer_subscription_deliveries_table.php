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
        Schema::create('customer_subscription_deliveries', function (Blueprint $table) {
            $table->id();




            // 1: general
            $table->date('deliveryDate')->nullable();
            $table->string('pickupTime', 100)->nullable();
            $table->string('deliveryTime', 100)->nullable();



            $table->string('status', 100)->nullable()->default('Pending');
            $table->string('pauseToken', 100)->nullable();




            // 1.2: isBagCollected - imageFile - remarks - driver - imageFile
            $table->text('imageFile')->nullable();
            $table->string('remarks', 255)->nullable();
            $table->double('cashOnDelivery', 15)->nullable();
            $table->boolean('isBagCollected')->nullable()->default(0);


            $table->bigInteger('driverId')->unsigned()->nullable();
            $table->foreign('driverId')->references('id')->on('drivers')->onDelete('set null');











            // 2: plan - subscription - customer
            $table->bigInteger('planId')->unsigned()->nullable();
            $table->foreign('planId')->references('id')->on('plans')->onDelete('cascade');


            $table->bigInteger('customerSubscriptionId')->unsigned()->nullable();
            $table->foreign('customerSubscriptionId')->references('id')->on('customer_subscriptions')->onDelete('cascade');



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
        Schema::dropIfExists('customer_subscription_deliveries');
    }
};
