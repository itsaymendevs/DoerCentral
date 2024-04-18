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
        Schema::create('blog_tags', function (Blueprint $table) {
            $table->id();


            $table->string('tag', 255)->nullable();


            // 1.2: blog
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
        Schema::dropIfExists('blog_tags');
    }
};
