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
        Schema::create('payment_methods', function (Blueprint $table) {
            $table->id();


            // 1: general
            $table->string('name', 255)->nullable();



            // 1.2: KEYS in .envFile
            $table->text('envKey')->nullable();
            $table->text('envSecondKey')->nullable();
            $table->text('envThirdKey')->nullable();
            $table->text('envFourthKey')->nullable();





            // 1.3: isActive
            $table->boolean('isActive')->nullable()->default(1);



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down() : void
    {
        Schema::dropIfExists('payment_methods');
    }
};
