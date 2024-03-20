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
            $table->text('email')->nullable();
            $table->string('name', 255)->nullable();
            $table->string('gender', 100)->nullable();

            $table->string('phone', 100)->nullable();
            $table->string('whatsapp', 100)->nullable();

            $table->text('password')->nullable();



            // 1.2: isActive
            $table->boolean('isActive')->nullable()->default(1);





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
