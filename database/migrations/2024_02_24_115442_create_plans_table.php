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
            $table->string('nameURL', 255)->nullable();
            $table->string('sectionTitle', 255)->nullable();
            $table->string('startingPrice', 100)->nullable();



            // 1.2: caption - desc
            $table->text('caption')->nullable();
            $table->text('desc')->nullable();
            $table->text('longDesc')->nullable();





            // 1.3: isForWebsite
            $table->boolean('isForWebsite')->nullable()->default(1);




            // 1.4: imageFile
            $table->text('imageFile')->nullable();
            $table->text('secondImageFile')->nullable();
            $table->text('thirdImageFile')->nullable();
            $table->text('fourthImageFile')->nullable();
            $table->text('fifthImageFile')->nullable();
            $table->text('sixthImageFile')->nullable();






            // 1.6: video
            $table->text('videoURL')->nullable();
            $table->text('videoCoverFile')->nullable();





            // 1.7: color
            $table->bigInteger('colorPaletteId')->unsigned()->nullable();
            $table->foreign('colorPaletteId')->references('id')->on('color_palettes')->onDelete('set null');





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
