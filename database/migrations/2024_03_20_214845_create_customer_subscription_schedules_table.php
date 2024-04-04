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
        Schema::create('customer_subscription_schedules', function (Blueprint $table) {
            $table->id();




            // 1: general
            $table->date('scheduleDate')->nullable();
            $table->string('status', 100)->nullable()->default('Pending');





            // 1.2: calendarSchedule
            $table->bigInteger('menuCalendarScheduleId')->unsigned()->nullable();
            $table->foreign('menuCalendarScheduleId')->references('id')->on('menu_calendar_schedules')->onDelete('set null');







            // 1.3: subscriptionDelivery
            $table->bigInteger('customerSubscriptionDeliveryId')->unsigned()->nullable();
            $table->foreign('customerSubscriptionDeliveryId', 'customer_subscription_schedules_subscription_delivery_id_foreign')->references('id')->on('customer_subscription_deliveries')->onDelete('cascade');












            // 1.3: plan - subscription - customer
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
        Schema::dropIfExists('customer_subscription_schedules');
    }
};
