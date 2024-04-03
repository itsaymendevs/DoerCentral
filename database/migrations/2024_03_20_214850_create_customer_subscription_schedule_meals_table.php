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
        Schema::create('customer_subscription_schedule_meals', function (Blueprint $table) {
            $table->id();



            // 1: mealType - meal
            $table->bigInteger('mealTypeId')->unsigned()->nullable();
            $table->foreign('mealTypeId')->references('id')->on('meal_types')->onDelete('cascade');


            $table->bigInteger('mealId')->unsigned()->nullable();
            $table->foreign('mealId')->references('id')->on('meals')->onDelete('set null');





            // 1.2: remarks - cookStatus
            $table->text('remarks')->nullable();
            $table->string('cookStatus', 100)->nullable()->default('Pending');







            // 1.3: schedule
            $table->bigInteger('subscriptionScheduleId')->unsigned()->nullable();
            $table->foreign('subscriptionScheduleId', 'customer_subscription_schedule_meals_schedule_foreign')->references('id')->on('customer_subscription_schedules')->onDelete('cascade');









            // 1.4: sizeId - planBundleRangeId
            $table->bigInteger('sizeId')->unsigned()->nullable();
            $table->foreign('sizeId')->references('id')->on('sizes')->onDelete('set null');



            $table->bigInteger('planBundleRangeId')->unsigned()->nullable();
            $table->foreign('planBundleRangeId')->references('id')->on('plan_bundle_ranges')->onDelete('cascade');









            // 1.5: plan - subscription - customer
            $table->bigInteger('planId')->unsigned()->nullable();
            $table->foreign('planId')->references('id')->on('plans')->onDelete('cascade');


            $table->bigInteger('customerSubscriptionId')->unsigned()->nullable();
            $table->foreign('customerSubscriptionId', 'customer_subscription_schedule_meals_subscription_foreign')->references('id')->on('customer_subscriptions')->onDelete('cascade');




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
        Schema::dropIfExists('customer_subscription_schedule_meals');
    }
};
