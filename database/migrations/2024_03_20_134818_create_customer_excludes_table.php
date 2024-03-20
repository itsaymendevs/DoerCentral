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
        Schema::create('customer_excludes', function (Blueprint $table) {
            $table->id();


            // 1: exclude - customer
            $table->bigInteger('excludeId')->unsigned()->nullable();
            $table->foreign('excludeId')->references('id')->on('excludes')->onDelete('cascade');


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
        Schema::dropIfExists('customer_excludes');
    }
};
