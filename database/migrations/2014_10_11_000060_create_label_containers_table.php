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
        Schema::create('label_containers', function (Blueprint $table) {
            $table->id();



            // 1: label - container
            $table->bigInteger('labelId')->unsigned()->nullable();
            $table->foreign('labelId')->references('id')->on('labels')->onDelete('cascade');

            $table->bigInteger('containerId')->unsigned()->nullable();
            $table->foreign('containerId')->references('id')->on('containers')->onDelete('cascade');




            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down() : void
    {
        Schema::dropIfExists('label_containers');
    }
};
