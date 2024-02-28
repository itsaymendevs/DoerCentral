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
        Schema::create('drivers', function (Blueprint $table) {
            $table->id();

            // 1: general
            $table->string('name', 255)->nullable();
            $table->string('phone', 100)->nullable();
            $table->string('email', 255)->nullable();
            $table->string('license', 100)->nullable();
            $table->text('password')->nullable();


            // 1.2: profile - license
            $table->text('imageFile')->nullable();
            $table->text('licenseFile')->nullable();



            // 1.3: shiftType
            $table->bigInteger('shiftTypeId')->unsigned()->nullable();
            $table->foreign('shiftTypeId')->references('id')->on('shift_types')->onDelete('set null');






            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down() : void
    {
        Schema::dropIfExists('drivers');
    }
};
