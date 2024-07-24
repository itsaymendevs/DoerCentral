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



            // 0: template
            $table->string('template', 100)->nullable()->default('Grid Slider');





            // 1: colors
            $table->string('textColor', 100)->nullable()->default('#000000');
            $table->string('preloaderLineColor', 100)->nullable()->default('#000000');

            $table->string('cursorColor', 100)->nullable()->default('#000000');
            $table->string('cursorHoverColor', 100)->nullable()->default('#000000');


            $table->string('planCardTitleColor', 100)->nullable()->default('#000000');
            $table->string('planCardSubtitleColor', 100)->nullable()->default('#000000');
            $table->string('planCardCaptionColor', 100)->nullable()->default('#000000');
            $table->string('planCardHrColor', 100)->nullable()->default('#000000');
            $table->string('planCardButtonColor', 100)->nullable()->default('#000000');
            $table->string('planCardButtonHoverColor', 100)->nullable()->default('#000000');


            $table->string('navbarMenuColor', 100)->nullable()->default('#000000');
            $table->string('navbarMenuActiveColor', 100)->nullable()->default('#000000');
            $table->string('navbarLinksColor', 100)->nullable()->default('#000000');
            $table->string('navbarLinksHoverColor', 100)->nullable()->default('#000000');
            $table->string('navbarSocialLinksColor', 100)->nullable()->default('#000000');


            $table->string('sliderLineColor', 100)->nullable()->default('#000000');
            $table->string('sliderBulletsColor', 100)->nullable()->default('#000000');





            // :: forPlans
            $table->string('planSideTitleColor', 100)->nullable()->default('#000000');
            $table->string('planFilterLinksColor', 100)->nullable()->default('#000000');
            $table->string('planFilterLinksHoverBorderColor', 100)->nullable()->default('#000000');
            $table->string('planListNumbersColor', 100)->nullable()->default('#000000');
            $table->string('planMealDietColor', 100)->nullable()->default('#000000');
            $table->string('planMealsBorderColor', 100)->nullable()->default('#000000');
            $table->string('planMealsHoverBorderColor', 100)->nullable()->default('#000000');
            $table->string('planReviewsTitleColor', 100)->nullable()->default('#000000');








            // 1.5: backgroundColors
            $table->string('bodyBackgroundColor', 100)->nullable()->default('#000000');

            $table->string('planCardBackgroundColor', 100)->nullable()->default('#000000');
            $table->string('planCardButtonBackgroundColor', 100)->nullable()->default('#000000');

            $table->string('navbarBackgroundColor', 100)->nullable()->default('#000000');







            // ---------------------------------------------
            // ---------------------------------------------






            // 2: radius
            $table->string('planCardRadius', 100)->nullable()->default('0');






            // ---------------------------------------------
            // ---------------------------------------------






            // 3: alignment
            $table->string('planCardAlignment', 100)->nullable()->default('left');






            // ---------------------------------------------
            // ---------------------------------------------




            // 4: extra
            $table->string('planSliderArrows', 100)->nullable()->default('light');



            // :: forPlans
            $table->string('planSideTitleDisplay', 100)->nullable()->default('inline');








            // ---------------------------------------------
            // ---------------------------------------------




            // 5: show / hide


            // :: forPlans
            $table->boolean('showPlanCustomSection')->nullable()->default(false);
            $table->boolean('showPlanMealsTypeFilter')->nullable()->default(false);







            // ---------------------------------------------
            // ---------------------------------------------





            // 6: customSection
            $table->text('planCustomSectionVideoURL')->nullable();
            $table->string('planCustomSectionTitle', 255)->nullable();



            // 6.1: imageFiles
            $table->text('planCustomSectionImageFile')->nullable();
            $table->text('planCustomSectionSubtitle')->nullable();
            $table->text('planCustomSectionCaption')->nullable();

            $table->text('planCustomSectionSecondImageFile')->nullable();
            $table->text('planCustomSectionSecondSubtitle')->nullable();
            $table->text('planCustomSectionSecondCaption')->nullable();


            $table->text('planCustomSectionThirdImageFile')->nullable();
            $table->text('planCustomSectionThirdSubtitle')->nullable();
            $table->text('planCustomSectionThirdCaption')->nullable();


            $table->text('planCustomSectionFourthImageFile')->nullable();
            $table->text('planCustomSectionFourthSubtitle')->nullable();
            $table->text('planCustomSectionFourthCaption')->nullable();


            $table->text('planCustomSectionFifthImageFile')->nullable();
            $table->text('planCustomSectionFifthSubtitle')->nullable();
            $table->text('planCustomSectionFifthCaption')->nullable();


            $table->text('planCustomSectionSixthImageFile')->nullable();
            $table->text('planCustomSectionSixthSubtitle')->nullable();
            $table->text('planCustomSectionSixthCaption')->nullable();






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
