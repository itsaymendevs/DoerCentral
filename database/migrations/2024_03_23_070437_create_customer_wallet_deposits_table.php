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
        Schema::create('customer_wallet_deposits', function (Blueprint $table) {
            $table->id();



            // 1: general
            $table->date('depositDate')->nullable();
            $table->string('remarks', 255)->nullable();
            $table->double('amount', 15)->nullable()->default(0);




            // 1.2: subscriptionPauseId - isCanceled (optional)
            $table->bigInteger('subscriptionPauseId')->unsigned()->nullable();
            $table->foreign('subscriptionPauseId')->references('id')->on('customer_subscription_pauses')->onDelete('cascade');










            // 1.3: wallet - customer
            $table->bigInteger('walletId')->unsigned()->nullable();
            $table->foreign('walletId')->references('id')->on('customer_wallets')->onDelete('cascade');


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
        Schema::dropIfExists('customer_wallet_deposits');
    }
};
