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
            $table->boolean(column: 'isDefault')->nullable()->default(false);



            // 1.2: bundle - plan
            $table->bigInteger('planId')->unsigned()->nullable();
            $table->foreign('planId')->references('id')->on('plans')->onDelete('cascade');

            $table->bigInteger('bundleId')->unsigned()->nullable();
            $table->foreign('bundleId')->references('id')->on('bundles')->onDelete('cascade');



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
