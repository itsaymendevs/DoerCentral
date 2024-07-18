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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();


            // 1: general
            $table->string('name', 255)->nullable();
            $table->string('email', 255)->nullable();
            $table->string('phone', 100)->nullable();
            $table->string('locationAddress', 255)->nullable();



            // 1.2: imageFiles
            $table->text('imageFile')->nullable();
            $table->text('imageFileDark')->nullable();
            $table->text('preloaderImageFile')->nullable();







            // 1.3: fonts
            $table->longText('fontLinks')->nullable();

            $table->string('textFont', 100)->nullable()->default('Poppins');
            $table->string('headingFont', 100)->nullable()->default('Courgette');






            // 1.4: client - server (DOER)
            $table->text('clientURL')->nullable();
            $table->text('serverURL')->nullable();



            // 1.5: website - application - plansURL
            $table->text('websiteURL')->nullable();
            $table->text('plansURL')->nullable();
            $table->text('applicationURL')->nullable();




            // 1.6: city - district
            $table->bigInteger('cityId')->unsigned()->nullable();
            $table->foreign('cityId')->references('id')->on('cities')->onDelete('set null');


            $table->bigInteger('cityDistrictId')->unsigned()->nullable();
            $table->foreign('cityDistrictId')->references('id')->on('city_districts')->onDelete('set null');






            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down() : void
    {
        Schema::dropIfExists('profiles');
    }
};
