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
            $table->text('title')->nullable();
            $table->text('content')->nullable();



            // 1.2: sideImageFile - bottomImageFile
            $table->text('sideImageFile')->nullable();
            $table->text('bottomImageFile')->nullable();




            // 1.3: isCenter
            $table->boolean('isCenter')->nullable()->default(0);




            // 1.4: blog
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
