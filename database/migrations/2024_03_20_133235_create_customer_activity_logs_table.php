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
        Schema::create('customer_activity_logs', function (Blueprint $table) {
            $table->id();



            // 1: general
            $table->string('name', 255)->nullable();
            $table->dateTime('dateTime')->nullable();




            // 1.2: module - description
            $table->string('module', 255)->nullable();
            $table->text('description')->nullable();




            // 1.3: customer
            $table->bigInteger('customerId')->unsigned()->nullable();
            $table->foreign('customerId')->references('id')->on('customers')->onDelete('set null');



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down() : void
    {
        Schema::dropIfExists('customer_activity_logs');
    }
};
