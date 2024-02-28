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
        Schema::create('banners', function (Blueprint $table) {
            $table->id();

            // 1: general
            $table->text('title')->nullable();
            $table->text('content')->nullable();
            $table->text('bannerURL')->nullable();


            // 1.2: imageFile
            $table->text('imageFile')->nullable();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down() : void
    {
        Schema::dropIfExists('banners');
    }
};
