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
        Schema::create('customer_allergies', function (Blueprint $table) {
            $table->id();


            // 1: allergy - customer
            $table->bigInteger('allergyId')->unsigned()->nullable();
            $table->foreign('allergyId')->references('id')->on('allergies')->onDelete('cascade');


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
        Schema::dropIfExists('customer_allergies');
    }
};
