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
        Schema::create('bundles', function (Blueprint $table) {
            $table->id();


            // 1: general
            $table->string('name', 255)->nullable();
            $table->string('nameURL', 255)->nullable();

            $table->double('price', 15)->unsigned()->nullable()->default(0);



            // 1.2: module
            $table->bigInteger('featureModuleId')->unsigned()->nullable();
            $table->foreign('featureModuleId')->references('id')->on('feature_modules')->onDelete('cascade');




            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down() : void
    {
        Schema::dropIfExists('bundles');
    }
};
