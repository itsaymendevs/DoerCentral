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
        Schema::create('shift_types', function (Blueprint $table) {
            $table->id();

            // 1: general
            $table->string('name', 100)->nullable();

            $table->string('shiftFrom', 100)->nullable();
            $table->string('shiftUntil', 100)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down() : void
    {
        Schema::dropIfExists('shift_types');
    }
};
