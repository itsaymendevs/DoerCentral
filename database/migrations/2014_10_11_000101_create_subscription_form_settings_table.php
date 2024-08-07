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
            $table->string('textColor', 100)->nullable()->default('#000000');
            $table->string('textActiveColor', 100)->nullable()->default('#000000');

            $table->string('preloaderLineColor', 100)->nullable()->default('#000000');

            $table->string('cursorColor', 100)->nullable()->default('#000000');
            $table->string('cursorHoverColor', 100)->nullable()->default('#000000');

            $table->string('navbarMenuColor', 100)->nullable()->default('#000000');
            $table->string('navbarMenuActiveColor', 100)->nullable()->default('#000000');
            $table->string('navbarLinksColor', 100)->nullable()->default('#000000');
            $table->string('navbarLinksHoverColor', 100)->nullable()->default('#000000');
            $table->string('navbarSocialLinksColor', 100)->nullable()->default('#000000');

            $table->string('sliderBulletsColor', 100)->nullable()->default('#000000');



            $table->string('brandColor', 100)->nullable()->default('#000000');
            $table->string('brandActiveColor', 100)->nullable()->default('#000000');

            $table->string('inputBorderColor', 100)->nullable()->default('#000000');
            $table->string('inputBorderHoverColor', 100)->nullable()->default('#000000');


            $table->string('planTitleColor', 100)->nullable()->default('#000000');
            $table->string('planHrColor', 100)->nullable()->default('#000000');
            $table->string('planCarbsBoxColor', 100)->nullable()->default('#000000');
            $table->string('planProteinsBoxColor', 100)->nullable()->default('#000000');
            $table->string('planFatsBoxColor', 100)->nullable()->default('#000000');



            $table->string('headingHrColor', 100)->nullable()->default('#000000');


            $table->string('bundleBoxColor', 100)->nullable()->default('#000000');
            $table->string('bundleBorderColor', 100)->nullable()->default('#000000');
            $table->string('bundleMotionColor', 100)->nullable()->default('#000000');

            $table->string('bundlePickColor', 100)->nullable()->default('#000000');
            $table->string('bundlePickActiveColor', 100)->nullable()->default('#000000');
            $table->string('bundlePickShadowColor', 100)->nullable()->default('#000000');
            $table->string('bundlePickShadowActiveColor', 100)->nullable()->default('#000000');


            $table->string('planRangeBorderColor', 100)->nullable()->default('#000000');
            $table->string('planRangeBorderActiveColor', 100)->nullable()->default('#000000');


            $table->string('planDaysBorderColor', 100)->nullable()->default('#000000');
            $table->string('planDaysBorderActiveColor', 100)->nullable()->default('#000000');


            $table->string('preferenceLineColor', 100)->nullable()->default('#000000');
            $table->string('preferenceInfoColor', 100)->nullable()->default('#000000');

            $table->string('pickPreferenceTextColor', 100)->nullable()->default('#000000');





            $table->string('summaryBundleColor', 100)->nullable()->default('#000000');
            $table->string('summaryBorderColor', 100)->nullable()->default('#000000');
            $table->string('summarySpecialBorderColor', 100)->nullable()->default('#000000');



            $table->string('addressMotionColor', 100)->nullable()->default('#000000');
            $table->string('addressActiveMotionColor', 100)->nullable()->default('#000000');

            $table->string('invoiceMotionColor', 100)->nullable()->default('#000000');
            $table->string('invoiceTableBorderColor', 100)->nullable()->default('#000000');






            // 2: background
            $table->string('bodyBackgroundColor', 100)->nullable()->default('#000000');

            $table->string('bodyBackgroundFirstColor', 100)->nullable()->default('#000000');
            $table->string('bodyBackgroundSecondColor', 100)->nullable()->default('#000000');
            $table->string('bodyBackgroundThirdColor', 100)->nullable()->default('#000000');
            $table->string('bodyBackgroundFourthColor', 100)->nullable()->default('#000000');


            $table->string('navbarBackgroundColor', 100)->nullable()->default('#000000');

            $table->string('planMacroBackgroundColor', 100)->nullable()->default('#000000');
            $table->string('inputBackgroundColor', 100)->nullable()->default('#000000');

            $table->string('planDaysDiscountBackgroundColor', 100)->nullable()->default('#000000');

            $table->string('preferenceBackgroundColor', 100)->nullable()->default('#000000');
            $table->string('preferenceBagBackgroundColor', 100)->nullable()->default('#000000');

            $table->string('pickPreferenceBackgroundColor', 100)->nullable()->default('#000000');
            $table->string('pickPreferenceHoverBackgroundColor', 100)->nullable()->default('#000000');

            $table->string('summaryBackgroundColor', 100)->nullable()->default('#000000');

            $table->string('buttonBackgroundColor', 100)->nullable()->default('#000000');
            $table->string('buttonHoverBackgroundColor', 100)->nullable()->default('#000000');

            $table->string('modalBackgroundColor', 100)->nullable()->default('#000000');
            $table->string('addressBackgroundColor', 100)->nullable()->default('#000000');


            $table->string('invoiceBackgroundColor', 100)->nullable()->default('#000000');
            $table->string('invoiceMidSectionBackgroundColor', 100)->nullable()->default('#000000');












            // -----------------------------------------------------------------
            // -----------------------------------------------------------------
            // -----------------------------------------------------------------





            // 3: show / hide
            $table->boolean('showPlanMacros')->nullable()->default(false);
            $table->boolean('showBundlePicture')->nullable()->default(false);
            $table->boolean('showBundleMotion')->nullable()->default(false);

            $table->boolean('showPlanDaysDiscount')->nullable()->default(false);

            $table->boolean('showPreferenceBag')->nullable()->default(false);
            $table->boolean('showButtonMotion')->nullable()->default(false);

            $table->boolean('showPickPreference')->nullable()->default(false);
            $table->boolean('showSummaryBundlePicture')->nullable()->default(false);

            $table->boolean('showAddressMotion')->nullable()->default(false);
            $table->boolean('showReferral')->nullable()->default(false);

            $table->boolean('showInvoiceText')->nullable()->default(false);
            $table->boolean('showInvoiceMotion')->nullable()->default(false);





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
