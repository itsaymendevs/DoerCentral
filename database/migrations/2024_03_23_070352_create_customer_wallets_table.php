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
        Schema::create('customer_wallets', function (Blueprint $table) {
            $table->id();



            // 1: general
            $table->double('balance', 15)->nullable()->default(0);
            $table->boolean('isActive')->nullable()->default(1);



            // 1.2: customer
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
        Schema::dropIfExists('customer_wallets');
    }
};
