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
        Schema::create('customer_subscriptions', function (Blueprint $table) {
            $table->id();



            // 1: general
            $table->date('startDate')->nullable();
            $table->date('untilDate')->nullable();

            $table->integer('planDays')->nullable();
            $table->text('planDeliveryDays')->nullable();






            // ----------------------------------------
            // ----------------------------------------






            // 2: plan - range - bundle
            $table->bigInteger('planId')->unsigned()->nullable();
            $table->foreign('planId')->references('id')->on('plans')->onDelete('cascade');


            $table->bigInteger('planRangeId')->unsigned()->nullable();
            $table->foreign('planRangeId')->references('id')->on('plan_ranges')->onDelete('cascade');


            $table->bigInteger('planBundleId')->unsigned()->nullable();
            $table->foreign('planBundleId')->references('id')->on('plan_bundles')->onDelete('cascade');







            // ----------------------------------------
            // ----------------------------------------






            // 2.5: menuCalendar
            $table->bigInteger('menuCalendarId')->unsigned()->nullable();
            $table->foreign('menuCalendarId')->references('id')->on('menu_calendars')->onDelete('set null');





            // ----------------------------------------
            // ----------------------------------------








            // 3: bag
            $table->double('bagPrice', 15)->nullable();

            $table->bigInteger('bagId')->unsigned()->nullable();
            $table->foreign('bagId')->references('id')->on('bags')->onDelete('set null');






            // 3.1: promoCode
            $table->string('promoCode', 100)->nullable();
            $table->double('promoCodeDiscountPrice', 15)->nullable();



            $table->bigInteger('promoCodeId')->unsigned()->nullable();
            $table->foreign('promoCodeId')->references('id')->on('promo_codes')->onDelete('set null');





            // 3.1.5: wallet
            $table->double('walletDiscountPrice', 15)->nullable();








            // 3.2: cashOnDelivery - deliveryCharge
            $table->boolean('isCashOnDelivery')->nullable()->default(0);
            $table->double('deliveryCharge', 15)->nullable()->default(0);







            // ----------------------------------------
            // ----------------------------------------






            // 4: planPrice - totalPrice - totalCheckoutPrice
            $table->double('planPrice', 15)->nullable();
            $table->double('totalPrice', 15)->nullable();


            $table->double('totalCheckoutPrice', 15)->nullable();








            // ----------------------------------------
            // ----------------------------------------






            // 5: paymentDone - paymentURL - paymentReference
            $table->text('paymentURL')->nullable();
            $table->text('paymentReference')->nullable();

            $table->boolean('isPaymentDone')->nullable()->default(0);



            $table->bigInteger('paymentMethodId')->unsigned()->nullable();
            $table->foreign('paymentMethodId')->references('id')->on('payment_methods')->onDelete('set null');









            // 6: customer
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
        Schema::dropIfExists('customer_subscriptions');
    }
};
