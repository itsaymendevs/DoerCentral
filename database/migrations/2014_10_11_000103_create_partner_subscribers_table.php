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
        Schema::create('partner_subscribers', function (Blueprint $table) {
            $table->id();


            // 1: general
            $table->string('firstName', 100)->nullable();
            $table->string('lastName', 255)->nullable();
            $table->string('gender', 100)->nullable();
            $table->text('email')->nullable();





            // 1.2: partners
            $table->bigInteger('partnerId')->unsigned()->nullable();
            $table->foreign('partnerId')->references('id')->on('partners')->onDelete('cascade');




            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down() : void
    {
        Schema::dropIfExists('partner_subscribers');
    }
};
