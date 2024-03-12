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
        Schema::create('plan_bundle_range_prices', function (Blueprint $table) {
            $table->id();



            // 1: general
            $table->double('days', 15, 2)->nullable()->default(0);
            $table->double('discount', 15, 2)->nullable()->default(0);




            // 1.2: range - plan
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
        Schema::dropIfExists('plan_bundle_range_prices');
    }
};
