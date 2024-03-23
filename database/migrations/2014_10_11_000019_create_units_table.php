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
        Schema::create('units', function (Blueprint $table) {
            $table->id();

            // 1: general
            $table->string('name', 100)->nullable();


            // 1.2: toGrams - toMl
            $table->double('toGram', 15)->nullable()->default(1);
            $table->double('toML', 15)->nullable()->default(1);
            $table->double('toPiece', 15)->nullable()->default(1);


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down() : void
    {
        Schema::dropIfExists('units');
    }
};
