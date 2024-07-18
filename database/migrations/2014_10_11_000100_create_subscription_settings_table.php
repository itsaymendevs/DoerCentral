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
        Schema::create('subscription_settings', function (Blueprint $table) {

            $table->id();




            // 1: colors
            $table->string('textColor', 100)->nullable()->default('#000000');
            $table->string('preloaderLineColor', 100)->nullable()->default('#000000');

            $table->string('cursorColor', 100)->nullable()->default('#000000');
            $table->string('cursorHoverColor', 100)->nullable()->default('#000000');


            $table->string('planCardTitleColor', 100)->nullable()->default('#000000');
            $table->string('planCardSubtitleColor', 100)->nullable()->default('#000000');
            $table->string('planCardCaptionColor', 100)->nullable()->default('#000000');
            $table->string('planCardHrColor', 100)->nullable()->default('#000000');


            $table->string('navbarMenuColor', 100)->nullable()->default('#000000');
            $table->string('navbarMenuActiveColor', 100)->nullable()->default('#000000');
            $table->string('navbarLinksColor', 100)->nullable()->default('#000000');
            $table->string('navbarLinksHoverColor', 100)->nullable()->default('#000000');
            $table->string('navbarSocialLinksColor', 100)->nullable()->default('#000000');


            $table->string('sliderLineColor', 100)->nullable()->default('#000000');
            $table->string('sliderBulletsColor', 100)->nullable()->default('#000000');





            // 1.5: backgroundColors
            $table->string('bodyBackgroundColor', 100)->nullable()->default('#000000');

            $table->string('planCardBackgroundColor', 100)->nullable()->default('#000000');

            $table->string('navbarBackgroundColor', 100)->nullable()->default('#000000');







            // ---------------------------------------------
            // ---------------------------------------------






            // 2: radius
            $table->string('planCardRadius', 100)->nullable()->default('0');






            // ---------------------------------------------
            // ---------------------------------------------




            // 3: alignment
            $table->string('planCardAlignment', 100)->nullable()->default('left');





            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down() : void
    {
        Schema::dropIfExists('subscription_settings');
    }
};
