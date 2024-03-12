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
        Schema::create('plan_bundles', function (Blueprint $table) {
            $table->id();


            // 1: general
            $table->string('name', 100)->nullable();
            $table->string('remarks', 255)->nullable();



            // 1.2: imageFile - isForWebsite
            $table->text('imageFile')->nullable();
            $table->boolean('isForWebsite')->nullable()->default(1);





            // 1.3: plan
            $table->bigInteger('planId')->unsigned()->nullable();
            $table->foreign('planId')->references('id')->on('plans')->onDelete('cascade');



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down() : void
    {
        Schema::dropIfExists('plan_bundles');
    }
};
