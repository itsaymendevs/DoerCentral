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
        Schema::create('customer_leads', function (Blueprint $table) {
            $table->id();



            // 1: general
            $table->string('email', 255)->nullable();
            $table->string('emailProvider', 255)->nullable();

            $table->string('gender', 100)->nullable();
            $table->string('firstName', 255)->nullable();
            $table->string('lastName', 255)->nullable();

            $table->string('phone', 100)->nullable();
            $table->string('phoneKey', 100)->nullable();
            $table->string('whatsapp', 100)->nullable();
            $table->string('whatsappKey', 100)->nullable();

            $table->boolean('isExistingCustomer')->nullable()->default(false);





            // 1.2: locationInformation
            $table->text('locationAddress')->nullable();
            $table->string('floor', 255)->nullable();
            $table->string('apartment', 255)->nullable();






            // 1.3: city - district - deliveryTime
            $table->bigInteger('cityId')->unsigned()->nullable();
            $table->foreign('cityId')->references('id')->on('cities')->onDelete('set null');


            $table->bigInteger('cityDistrictId')->unsigned()->nullable();
            $table->foreign('cityDistrictId')->references('id')->on('city_districts')->onDelete('set null');


            $table->bigInteger('cityDeliveryTimeId')->unsigned()->nullable();
            $table->foreign('cityDeliveryTimeId')->references('id')->on('city_delivery_times')->onDelete('set null');










            // ----------------------------------------
            // ----------------------------------------






            // 2: startDate - deliveryDays - planDays
            $table->date('startDate')->nullable();
            $table->integer('planDays')->nullable();
            $table->text('deliveryDays')->nullable();





            // :: excludes - allergies
            $table->text('allergyLists')->nullable();
            $table->text('excludeLists')->nullable();





            // ----------------------------------------
            // ----------------------------------------



            // 2.1: bag - bagPrice
            $table->string('bag', 100)->nullable();
            $table->double('bagPrice', 15)->nullable()->default(0);







            // ----------------------------------------
            // ----------------------------------------





            // 2.2: promoCode - promoCodeDiscountPrice
            $table->string('promoCode', 100)->nullable();
            $table->double('promoCodeDiscountPrice', 15)->nullable()->default(0);






            // ----------------------------------------
            // ----------------------------------------






            // 2.3: paymentDone - paymentURL - paymentReference
            $table->text('paymentURL')->nullable();
            $table->text('paymentReference')->nullable();
            $table->boolean('isPaymentDone')->nullable()->default(0);



            $table->bigInteger('paymentMethodId')->unsigned()->nullable();
            $table->foreign('paymentMethodId')->references('id')->on('payment_methods')->onDelete('set null');










            // ----------------------------------------
            // ----------------------------------------




            // 2.3: bundleTypes - bag - initialPrices
            $table->string('bundleTypes', 255)->nullable();

            $table->double('totalBundleRangePrice', 15)->nullable();
            $table->double('planPrice', 15)->nullable();
            $table->double('totalPrice', 15)->nullable();
            $table->double('totalCheckoutPrice', 15)->nullable();





            // 2.3: plan - range - bundle
            $table->bigInteger('planId')->unsigned()->nullable();
            $table->foreign('planId')->references('id')->on('plans')->onDelete('cascade');


            $table->bigInteger('planRangeId')->unsigned()->nullable();
            $table->foreign('planRangeId')->references('id')->on('plan_ranges')->onDelete('cascade');


            $table->bigInteger('planBundleId')->unsigned()->nullable();
            $table->foreign('planBundleId')->references('id')->on('plan_bundles')->onDelete('cascade');






            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down() : void
    {
        Schema::dropIfExists('customer_leads');
    }
};
