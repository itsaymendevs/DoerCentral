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
        Schema::create('bag_refunds', function (Blueprint $table) {
            $table->id();



            // 1: general
            $table->date('refundDate')->nullable();
            $table->string('remarks', 255)->nullable();
            $table->double('amount', 15)->nullable()->default(0);




            // 1.2: customerSubscription - customer
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
        Schema::dropIfExists('bag_refunds');
    }
};
