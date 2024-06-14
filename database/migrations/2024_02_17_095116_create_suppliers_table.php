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
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();

            // 1: general
            $table->string('name', 255)->nullable();
            $table->string('phone', 100)->nullable();
            $table->string('email', 255)->nullable();


            // 1.2: address
            $table->text('address')->nullable();




            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down() : void
    {
        Schema::dropIfExists('suppliers');
    }
};
