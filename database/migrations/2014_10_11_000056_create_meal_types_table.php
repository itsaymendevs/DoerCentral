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
        Schema::create('meal_types', function (Blueprint $table) {
            $table->id();


            // 1: general
            $table->string('name', 100)->nullable();
            $table->string('shortName', 100)->nullable();



            // 1.2: isFor => Meal / Snack / Etc ..
            $table->string('isFor', 100)->nullable();



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down() : void
    {
        Schema::dropIfExists('meal_types');
    }
};
