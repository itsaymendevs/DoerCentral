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
            $table->double('charge', 15)->nullable()->default(0);
            $table->double('radius', 15)->nullable()->default(0);
            $table->double('macroRadius', 15)->nullable()->default(0);



            // 1.2: padding
            $table->double('paddingLeft', 15)->nullable()->default(0);
            $table->double('paddingRight', 15)->nullable()->default(0);
            $table->double('paddingTop', 15)->nullable()->default(0);
            $table->double('paddingBottom', 15)->nullable()->default(0);




            // 1.3: isVertical - description
            $table->text('desc')->nullable();
            $table->boolean('isVertical')->nullable()->default(0);






            // 1.4: colors
            $table->string('fontColor', 100)->nullable();
            $table->string('backgroundColor', 100)->nullable();
            $table->string('borderColor', 100)->nullable();
            $table->string('labelBackgroundColor', 100)->nullable();
            $table->string('caloriesColor', 100)->nullable();
            $table->string('carbsColor', 100)->nullable();
            $table->string('fatsColor', 100)->nullable();
            $table->string('proteinsColor', 100)->nullable();







            // 1.5: showTags
            $table->boolean('showQRCode')->nullable()->default(0);
            $table->boolean('showPrice')->nullable()->default(0);

            $table->boolean('showProductionDate')->nullable()->default(0);
            $table->boolean('showExpiryDate')->nullable()->default(0);

            $table->boolean('showAllergy')->nullable()->default(0);
            $table->boolean('showFooterImageFile')->nullable()->default(0);
            $table->boolean('showServingInstructions')->nullable()->default(0);


            $table->boolean('showCustomerName')->nullable()->default(0);
            $table->boolean('showMealName')->nullable()->default(0);
            $table->boolean('showMealMacros')->nullable()->default(0);
            $table->boolean('showMealRemarks')->nullable()->default(0);










            // 1.6: imageFile - footerImageFile
            $table->text('imageFile')->nullable();
            $table->text('footerImageFile')->nullable();




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
