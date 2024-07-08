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


            // 1: textColors
            $table->string('textColor', 100)->nullable()->default('#000000');
            $table->string('textSecondaryColor', 100)->nullable()->default('#000000');
            $table->string('bodyColor', 100)->nullable()->default('#000000');




            // 1.2: hero
            $table->string('heroPictureRadius', 100)->nullable();
            $table->string('heroBackgroundColor', 100)->nullable()->default('#000000');
            $table->string('heroTextColor', 100)->nullable()->default('#000000');






            // 1.3: card
            $table->string('cardTitleColor', 100)->nullable()->default('#000000');
            $table->string('cardSubtitleColor', 100)->nullable()->default('#000000');
            $table->string('cardAuthorColor', 100)->nullable()->default('#000000');
            $table->string('cardButtonColor', 100)->nullable()->default('#000000');
            $table->string('cardButtonBorderColor', 100)->nullable()->default('#000000');
            $table->string('cardButtonBorderHoverColor', 100)->nullable()->default('#000000');



            // 1.4: hr - cursor
            $table->string('hrColor', 100)->nullable()->default('#000000');
            $table->string('cursorColor', 100)->nullable()->default('#000000');






            // 1.5: numberOfColumns
            $table->integer('numberOfColumns')->nullable()->default(3);




            // 1.6: alignment
            $table->string('cardAlignment', 100)->nullable();
            $table->string('heroTextAlignment', 100)->nullable();







            // --------------------------------------------
            // --------------------------------------------






            // 2: singleBlog



            // 2.1: hero
            $table->string('singleBlogHeroAlignment', 100)->nullable();



            // 2.2: sections
            $table->string('singleBlogSectionTitleAlignment', 100)->nullable();
            $table->string('singleBlogSectionContentAlignment', 100)->nullable();








            // --------------------------------------------
            // --------------------------------------------






            // 3: content



            // 3.1: hero
            $table->text('heroText')->nullable();

            $table->text('heroImageFile')->nullable();
            $table->text('heroSecondImageFile')->nullable();
            $table->text('heroThirdImageFile')->nullable();
            $table->text('heroFourthImageFile')->nullable();




            // 3.2: contentText
            $table->text('contentTitleText')->nullable();






            // 3.3: footer
            $table->text('footerText')->nullable();
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
