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
        Schema::create('customer_subscription_schedule_replacements', function (Blueprint $table) {
            $table->id();



            // 1: scheduleDate
            $table->date('scheduleDate')->nullable();




            // 1.2: mealType - meal - replacement
            $table->bigInteger('mealTypeId')->unsigned()->nullable();
            $table->foreign('mealTypeId')->references('id')->on('meal_types')->onDelete('cascade');


            $table->bigInteger('mealId')->unsigned()->nullable();
            $table->foreign('mealId')->references('id')->on('meals')->onDelete('cascade');



            $table->bigInteger('replacementId')->unsigned()->nullable();
            $table->foreign('replacementId', 'customer_subscription_schedule_replacements_rep_foreign')->references('id')->on('meals')->onDelete('cascade');




            // 1.3: remarks
            $table->text('remarks')->nullable();






            // 1.4: subscription - customer
            $table->bigInteger('customerSubscriptionId')->unsigned()->nullable();
            $table->foreign('customerSubscriptionId', 'customer_subscription_schedule_replacements_subscription_foreign')->references('id')->on('customer_subscriptions')->onDelete('cascade');




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
        Schema::dropIfExists('customer_subscription_schedule_replacements');
    }
};
