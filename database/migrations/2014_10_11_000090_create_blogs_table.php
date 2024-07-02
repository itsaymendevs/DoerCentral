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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();



            // 1: general
            $table->text('title')->nullable();
            $table->text('subtitle')->nullable();
            $table->text('summary')->nullable();

            $table->date('publishDate')->nullable();
            $table->string('author', 255)->nullable();



            // 1.2: isForWebsite
            $table->boolean('isForWebsite')->nullable()->default(1);
            $table->boolean('isDarkMode')->nullable()->default(0);
            $table->boolean('isCenter')->nullable()->default(0);





            // 1.3: imageFile (Desktop) - mobileImageFile - headerImageFile
            $table->text('imageFile')->nullable();
            $table->text('mobileImageFile')->nullable();
            $table->text('headerImageFile')->nullable();






            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down() : void
    {
        Schema::dropIfExists('blogs');
    }
};
