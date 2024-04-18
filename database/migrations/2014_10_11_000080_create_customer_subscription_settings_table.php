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
        Schema::create('customer_subscription_settings', function (Blueprint $table) {
            $table->id();


            // 1: general
            $table->integer('minimumDeliveryDays')->nullable()->default(1);
            $table->boolean('isPaymentSkipped')->nullable()->default(0);




            // 1.2: paymentMethod
            $table->bigInteger('paymentMethodId')->unsigned()->nullable();
            $table->foreign('paymentMethodId')->references('id')->on('payment_methods')->onDelete('set null');




            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down() : void
    {
        Schema::dropIfExists('customer_subscription_settings');
    }
};
