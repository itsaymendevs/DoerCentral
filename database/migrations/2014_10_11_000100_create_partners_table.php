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
        Schema::create('partners', function (Blueprint $table) {
            $table->id();

            // 1: general
            $table->string('name', 255)->nullable();
            $table->text('websiteURL')->nullable();



            // 1.2: redirectURLs
            $table->text('redirectURL')->nullable();
            $table->text('secondRedirectURL')->nullable();
            $table->text('thirdRedirectURL')->nullable();




            // 1.3: imageFile
            $table->text('imageFile')->nullable();



            // 1.4: isActive
            $table->boolean('isActive')->nullable()->default(1);



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down() : void
    {
        Schema::dropIfExists('partners');
    }
};
