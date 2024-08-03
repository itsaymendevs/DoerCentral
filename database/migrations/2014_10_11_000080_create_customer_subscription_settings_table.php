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


            // 1: delivery
            $table->integer('minimumDeliveryDays')->nullable()->default(1);
            $table->boolean('hasDeliveryCharge')->nullable()->default(0);





            // 1.2: paymentSkipped - paymentMethod
            $table->boolean('isPaymentSkipped')->nullable()->default(0);

            $table->bigInteger('paymentMethodId')->unsigned()->nullable();
            $table->foreign('paymentMethodId')->references('id')->on('payment_methods')->onDelete('set null');









            // 1.4: pause - unPause - shorten - skip - mealSelection
            $table->integer('pauseRestriction')->nullable()->default(0);
            $table->integer('unPauseRestriction')->nullable()->default(0);
            $table->integer('skipRestriction')->nullable()->default(0);
            $table->integer('shortenRestriction')->nullable()->default(0);


            $table->integer('changeCalendarRestriction')->nullable()->default(0);
            $table->integer('mealSelectionRestriction')->nullable()->default(1);








            // 1.5: mapsKey
            $table->text('mapsKey')->nullable();





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
