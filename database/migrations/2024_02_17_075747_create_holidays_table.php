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
        Schema::create('holidays', function (Blueprint $table) {
            $table->id();


            // 1: general
            $table->string('weekday', 100)->nullable();
            $table->string('isActive', 100)->nullable()->default(1);

            $table->text('message')->nullable();



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down() : void
    {
        Schema::dropIfExists('holidays');
    }
};
