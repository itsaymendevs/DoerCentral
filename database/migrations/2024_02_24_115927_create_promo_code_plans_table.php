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
        Schema::create('promo_code_plans', function (Blueprint $table) {
            $table->id();

            // 1: promoCode - plan
            $table->bigInteger('promoCodeId')->unsigned()->nullable();
            $table->foreign('promoCodeId')->references('id')->on('promo_codes')->onDelete('cascade');


            $table->bigInteger('planId')->unsigned()->nullable();
            $table->foreign('planId')->references('id')->on('plans')->onDelete('cascade');




            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down() : void
    {
        Schema::dropIfExists('promo_code_plans');
    }
};
