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
        Schema::create('plan_bundle_ranges', function (Blueprint $table) {
            $table->id();



            // 1: isForWebsite
            $table->boolean('isForWebsite')->nullable()->default(1);





            // 1.2: range - bundle
            $table->bigInteger('planRangeId')->unsigned()->nullable();
            $table->foreign('planRangeId')->references('id')->on('plan_ranges')->onDelete('cascade');


            $table->bigInteger('planBundleId')->unsigned()->nullable();
            $table->foreign('planBundleId')->references('id')->on('plan_bundles')->onDelete('cascade');





            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down() : void
    {
        Schema::dropIfExists('plan_bundle_ranges');
    }
};
