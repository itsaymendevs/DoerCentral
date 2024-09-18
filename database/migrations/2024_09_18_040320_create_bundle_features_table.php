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
        Schema::create('bundle_features', function (Blueprint $table) {
            $table->id();



            // 1: bundle - feature
            $table->bigInteger('bundleId')->unsigned()->nullable();
            $table->foreign('bundleId')->references('id')->on('bundles')->onDelete('cascade');

            $table->bigInteger('featureId')->unsigned()->nullable();
            $table->foreign('featureId')->references('id')->on('features')->onDelete('cascade');



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down() : void
    {
        Schema::dropIfExists('bundle_features');
    }
};
