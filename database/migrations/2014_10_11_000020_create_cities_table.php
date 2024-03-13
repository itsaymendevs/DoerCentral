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
        Schema::create('cities', function (Blueprint $table) {
            $table->id();

            // 1: general
            $table->string('name', 100)->nullable();
            $table->double('deliveryCharge', 15)->nullable()->default(0);





            // 1.2: isActive / showOnInvoice
            $table->boolean('isActive')->nullable()->default(1);
            $table->boolean('isOnDeliveryInvoice')->nullable()->default(1);






            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down() : void
    {
        Schema::dropIfExists('cities');
    }
};
