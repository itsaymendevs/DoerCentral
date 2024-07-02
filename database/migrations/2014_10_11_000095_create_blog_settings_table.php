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
        Schema::create('blog_settings', function (Blueprint $table) {
            $table->id();


            // 1: general
            $table->string('color', 100)->nullable();
            $table->string('hrColor', 100)->nullable();
            $table->string('titlePlacement', 100)->nullable();




            // 1.2: font
            $table->text('fontURL')->nullable();
            $table->string('font', 255)->nullable();




            // 1.2: menuLinks
            $table->text('homeURL')->nullable();
            $table->text('contactURL')->nullable();
            $table->text('blogsURL')->nullable();



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down() : void
    {
        Schema::dropIfExists('blog_settings');
    }
};
