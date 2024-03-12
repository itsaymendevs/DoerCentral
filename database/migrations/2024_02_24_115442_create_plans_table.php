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
        Schema::create('plans', function (Blueprint $table) {
            $table->id();


            // 1: general
            $table->string('name', 255)->nullable();
            $table->double('startingPrice', 15)->nullable()->default(0);

            $table->text('desc')->nullable();
            $table->text('longDesc')->nullable();


            // 1.2: isForWebsite
            $table->boolean('isForWebsite')->nullable()->default(1);



            // 1.3: imageFile
            $table->text('imageFile')->nullable();




            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down() : void
    {
        Schema::dropIfExists('plans');
    }
};
