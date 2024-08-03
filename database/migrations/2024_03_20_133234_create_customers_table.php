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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();


            // 1: general
            $table->string('email', 255)->nullable();
            $table->string('emailProvider', 255)->nullable();

            $table->string('firstName', 255)->nullable();
            $table->string('lastName', 255)->nullable();
            $table->string('gender', 100)->nullable();
            $table->date('birthDate')->nullable();




            $table->string('phone', 100)->nullable();
            $table->string('phoneKey', 100)->nullable();

            $table->string('whatsapp', 100)->nullable();
            $table->string('whatsappKey', 100)->nullable();

            $table->double('weight', 15)->nullable();
            $table->double('height', 15)->nullable();
            $table->text('password')->nullable();



            // 1.2: isActive - isVIP - isEnabled
            $table->boolean('isVIP')->nullable()->default(0);
            $table->boolean('isActive')->nullable()->default(1);
            $table->boolean('isEnabled')->nullable()->default(1);





            // 1.3: bagRemarks
            $table->string('bagRemarks', 255)->nullable();




            // 1.4: re-token - referral
            $table->text('referral')->nullable();
            $table->text('reToken')->nullable();






            // 1.5: manager - driver
            $table->bigInteger('managerId')->unsigned()->nullable();
            $table->foreign('managerId')->references('id')->on('users')->onDelete('set null');


            $table->bigInteger('driverId')->unsigned()->nullable();
            $table->foreign('driverId')->references('id')->on('drivers')->onDelete('set null');





            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down() : void
    {
        Schema::dropIfExists('customers');
    }
};
