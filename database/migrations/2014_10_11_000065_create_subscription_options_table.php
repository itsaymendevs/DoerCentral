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
        Schema::create('subscription_options', function (Blueprint $table) {
            $table->id();


            // 1: pause - unPause - extend - shorten
            $table->integer('pauseConditionDays')->nullable()->default(0);
            $table->integer('unPauseConditionDays')->nullable()->default(0);

            $table->integer('extendConditionDays')->nullable()->default(0);
            $table->integer('shortenConditionDays')->nullable()->default(0);


            $table->timestamps();



        });
    }

    /**
     * Reverse the migrations.
     */
    public function down() : void
    {
        Schema::dropIfExists('subscription_options');
    }
};
