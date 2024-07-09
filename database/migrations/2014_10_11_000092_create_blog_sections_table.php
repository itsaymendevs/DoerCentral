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
        Schema::create('blog_sections', function (Blueprint $table) {
            $table->id();


            // 1: general
            $table->longText('title')->nullable();
            $table->longText('content')->nullable();
            $table->string('type', 100)->nullable()->default('Regular');




            // 1.3: imageFiles
            $table->text('imageFile')->nullable();
            $table->text('secondImageFile')->nullable();
            $table->text('thirdImageFile')->nullable();
            $table->text('fourthImageFile')->nullable();




            // 1.3: blog
            $table->bigInteger('blogId')->unsigned()->nullable();
            $table->foreign('blogId')->references('id')->on('blogs')->onDelete('cascade');



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down() : void
    {
        Schema::dropIfExists('blog_sections');
    }
};
