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
        Schema::create('subscription_form_settings', function (Blueprint $table) {
            $table->id();




            // 1: colors
            $table->string('brandColor', 100)->nullable()->default('#000000');
            $table->string('brandActiveColor', 100)->nullable()->default('#000000');


            $table->string('titleHrColor', 100)->nullable()->default('#000000');


            $table->string('fatsBoxColor', 100)->nullable()->default('#000000');
            $table->string('carbsBoxColor', 100)->nullable()->default('#000000');
            $table->string('proteinBoxColor', 100)->nullable()->default('#000000');



            $table->string('bundleBorderColor', 100)->nullable()->default('#000000');
            $table->string('bundleMotionColor', 100)->nullable()->default('#000000');

            $table->string('bundlePickColor', 100)->nullable()->default('#000000');
            $table->string('bundlePickActiveColor', 100)->nullable()->default('#000000');
            $table->string('bundlePickShadowColor', 100)->nullable()->default('#000000');
            $table->string('bundlePickShadowActiveColor', 100)->nullable()->default('#000000');


            $table->string('summaryBorderColor', 100)->nullable()->default('#000000');

            $table->string('inputBorderColor', 100)->nullable()->default('#000000');
            $table->string('inputBorderHoverColor', 100)->nullable()->default('#000000');



            $table->string('addressMotionColor', 100)->nullable()->default('#000000');
            $table->string('addressActiveMotionColor', 100)->nullable()->default('#000000');


            $table->string('invoiceMotionColor', 100)->nullable()->default('#000000');




            // 2: background
            $table->string('planBackgroundFirstColor', 100)->nullable()->default('#000000');
            $table->string('planBackgroundSecondColor', 100)->nullable()->default('#000000');
            $table->string('planBackgroundThirdColor', 100)->nullable()->default('#000000');
            $table->string('planBackgroundFourthColor', 100)->nullable()->default('#000000');


            $table->string('bundleBackgroundColor', 100)->nullable()->default('#000000');
            $table->string('summaryBackgroundColor', 100)->nullable()->default('#000000');


            $table->string('bagCaptionBackgroundColor', 100)->nullable()->default('#000000');

            $table->string('preferencesBackgroundColor', 100)->nullable()->default('#000000');


            $table->string('buttonBackgroundColor', 100)->nullable()->default('#000000');
            $table->string('buttonActiveBackgroundColor', 100)->nullable()->default('#000000');




            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down() : void
    {
        Schema::dropIfExists('subscription_form_settings');
    }
};
