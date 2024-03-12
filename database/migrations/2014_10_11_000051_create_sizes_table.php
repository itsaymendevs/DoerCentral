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
        Schema::create('sizes', function (Blueprint $table) {
            $table->id();

            // 1: general
            $table->string('name', 255)->nullable();
            $table->double('price', 15)->nullable();


            $table->double('calories', 15)->nullable()->default(0);
            $table->double('proteins', 15)->nullable()->default(0);
            $table->double('carbs', 15)->nullable()->default(0);
            $table->double('fats', 15)->nullable()->default(0);





            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down() : void
    {
        Schema::dropIfExists('sizes');
    }
};
