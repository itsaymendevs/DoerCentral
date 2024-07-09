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
        Schema::create('blog_settings', function (Blueprint $table) {
            $table->id();



            // 0.5: fonts
            $table->longText('fontLinks')->nullable();

            $table->string('textFont', 100)->nullable()->default('Poppins');
            $table->string('headingFont', 100)->nullable()->default('Courgette');






            // 1: textColors
            $table->string('textColor', 100)->nullable()->default('#000000');
            $table->string('bodyColor', 100)->nullable()->default('#000000');




            // 1.2: hero
            $table->string('heroPictureRadius', 100)->nullable()->default('10');
            $table->string('heroBackgroundColor', 100)->nullable()->default('#000000');
            $table->string('heroTextColor', 100)->nullable()->default('#000000');




            // 1.3: slider
            $table->string('sliderIndicatorColor', 100)->nullable()->default('#000000');
            $table->string('sliderIndicatorPlacement', 100)->nullable();




            // 1.4: mobileMenu
            $table->string('mobileMenuTextColor', 100)->nullable()->default('#000000');
            $table->string('mobileMenuBackgroundColor', 100)->nullable()->default('#000000');







            // 1.3: card
            $table->string('cardTitleColor', 100)->nullable()->default('#000000');
            $table->string('cardSubtitleColor', 100)->nullable()->default('#000000');
            $table->string('cardDateColor', 100)->nullable()->default('#000000');
            $table->string('cardAuthorColor', 100)->nullable()->default('#000000');
            $table->string('cardButtonColor', 100)->nullable()->default('#000000');
            $table->string('cardButtonHoverColor', 100)->nullable()->default('#000000');
            $table->string('cardButtonBorderColor', 100)->nullable()->default('#000000');
            $table->string('cardButtonBorderHoverColor', 100)->nullable()->default('#000000');
            $table->string('cardButtonShadowColor', 100)->nullable()->default('#000000');
            $table->string('cardButtonShadowHoverColor', 100)->nullable()->default('#000000');



            // 1.4: hr - cursor
            $table->string('hrColor', 100)->nullable()->default('#000000');
            $table->string('cursorColor', 100)->nullable()->default('#000000');
            $table->string('cursorSecondaryColor', 100)->nullable()->default('#000000');






            // 1.5: numberOfColumns
            $table->integer('numberOfColumns')->nullable()->default(3);




            // 1.6: alignment
            $table->string('cardAlignment', 100)->nullable()->default('left');
            $table->string('heroTextAlignment', 100)->nullable()->default('left');







            // --------------------------------------------
            // --------------------------------------------






            // 2: singleBlog Special



            // 2.1: hero
            $table->string('singleBlogHeroAlignment', 100)->nullable()->default('left');
            $table->string('singleBlogNavbarTextColor', 100)->nullable()->default('#000000');
            $table->string('singleBlogNavbarBackgroundColor', 100)->nullable()->default('#000000');



            // 2.2: mid-section
            $table->string('singleBlogAuthorColor', 100)->nullable()->default('#000000');






            // 2.3: sections
            $table->string('singleBlogSectionTitleAlignment', 100)->nullable()->default('left');
            $table->string('singleBlogSectionContentAlignment', 100)->nullable()->default('left');



            // 2.4: tags
            $table->string('singleBlogTagColor', 100)->nullable()->default('#000000');
            $table->string('singleBlogTagHoverColor', 100)->nullable()->default('#000000');
            $table->string('singleBlogTagTextColor', 100)->nullable()->default('#000000');
            $table->string('singleBlogTagTextHoverColor', 100)->nullable()->default('#000000');







            // --------------------------------------------
            // --------------------------------------------






            // 3: content




            // 3.1: logo
            $table->text('logoImageFile')->nullable();




            // 3.2: hero
            $table->longText('heroText')->nullable();

            $table->text('heroImageFile')->nullable();
            $table->text('heroSecondImageFile')->nullable();
            $table->text('heroThirdImageFile')->nullable();
            $table->text('heroFourthImageFile')->nullable();




            // 3.3: contentText
            $table->longText('contentTitleText')->nullable();






            // 3.4: footer
            $table->longText('footerText')->nullable();
            $table->text('footerImageFile')->nullable();
            $table->text('footerCopyrightsText')->nullable();














            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down() : void
    {
        Schema::dropIfExists('blog_settings');
    }
};
