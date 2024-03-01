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
        Schema::create('promo_codes', function (Blueprint $table) {
            $table->id();

            // 1: general
            $table->string('name', 100)->nullable();
            $table->string('code', 100)->nullable();


            // 1.2: percentage or amount
            $table->double('percentage', 15, 2)->nullable();
            $table->double('cashAmount', 15, 2)->nullable();





            // 1.3: limit - currentUsage
            $table->double('limit', 15, 2)->nullable()->default(1);
            $table->double('currentUsage', 15, 2)->nullable()->default(0);



            // 1.4: isActive - isForWebsite
            $table->boolean('isActive')->nullable()->default(1);
            $table->boolean('isForWebsite')->nullable()->default(1);



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down() : void
    {
        Schema::dropIfExists('promo_codes');
    }
};
