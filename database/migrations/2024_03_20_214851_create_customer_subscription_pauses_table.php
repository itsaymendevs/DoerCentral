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
        Schema::create('customer_subscription_pauses', function (Blueprint $table) {
            $table->id();



            // 1: general
            $table->string('type', 100)->nullable()->default('Refund Wallet'); // - Extend Subscription

            $table->date('fromDate')->nullable();
            $table->date('untilDate')->nullable();
            $table->text('remarks')->nullable();





            // 1.2: cancellation
            $table->date('cancellationDate')->nullable();
            $table->boolean('isCanceled')->nullable()->default(0);





            // 1.3: pauseDays - pricePerDay - totalPrice
            $table->integer('pauseDays')->nullable();
            $table->double('pricePerDay', 15)->nullable();
            $table->double('totalPrice', 15)->nullable();







            // 2: subscription - customer
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
        Schema::dropIfExists('customer_subscription_pauses');
    }
};
