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
        Schema::create('menu_calendar_schedules', function (Blueprint $table) {
            $table->id();



            // 1: general
            $table->date('scheduleDate')->nullable();



            // 1.2: mealType - meal
            $table->bigInteger('mealTypeId')->unsigned()->nullable();
            $table->foreign('mealTypeId')->references('id')->on('meal_types')->onDelete('cascade');


            $table->bigInteger('mealId')->unsigned()->nullable();
            $table->foreign('mealId')->references('id')->on('meals')->onDelete('cascade');






            // 1.3: calendar
            $table->bigInteger('menuCalendarId')->unsigned()->nullable();
            $table->foreign('menuCalendarId')->references('id')->on('menu_calendars')->onDelete('cascade');





            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down() : void
    {
        Schema::dropIfExists('menu_calendar_schedules');
    }
};
