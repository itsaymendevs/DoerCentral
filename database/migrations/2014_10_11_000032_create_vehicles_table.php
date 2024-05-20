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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();


            // 1: general
            $table->string('name', 255)->nullable();
            $table->string('type', 100)->nullable();
            $table->string('reference', 255)->nullable();




            // 1.2: plate
            $table->string('plate', 100)->nullable();
            $table->date('issueDate')->nullable();
            $table->date('expiryDate')->nullable();






            // 1.3: files
            $table->text('imageFile')->nullable();
            $table->text('plateFile')->nullable();
            $table->text('insuranceFile')->nullable();
            $table->text('ownershipFile')->nullable();



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down() : void
    {
        Schema::dropIfExists('vehicles');
    }
};
