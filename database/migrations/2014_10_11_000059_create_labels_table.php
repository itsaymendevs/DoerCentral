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
        Schema::create('labels', function (Blueprint $table) {
            $table->id();


            // 1: general
            $table->string('name', 255)->nullable();
            $table->double('width', 15)->nullable();
            $table->double('height', 15)->nullable();
            $table->double('radius', 15)->nullable()->default(0);




            // 1.2: colors
            $table->string('backgroundColor', 100)->nullable();
            $table->string('fontColor', 100)->nullable();
            $table->string('labelBackgroundColor', 100)->nullable();


            // 1.3: showTags
            $table->boolean('showQRCode')->nullable()->default(1);
            $table->boolean('showPrice')->nullable()->default(1);
            $table->boolean('showAllergy')->nullable()->default(1);
            $table->boolean('showMealRemarks')->nullable()->default(1);
            $table->boolean('showCustomerName')->nullable()->default(1);
            $table->boolean('showProductionDate')->nullable()->default(1);
            $table->boolean('showServingInstructions')->nullable()->default(1);





            // 1.4: imageFile - desc
            $table->text('desc')->nullable();
            $table->text('imageFile')->nullable();



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down() : void
    {
        Schema::dropIfExists('labels');
    }
};
