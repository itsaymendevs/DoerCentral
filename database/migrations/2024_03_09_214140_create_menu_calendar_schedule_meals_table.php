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
        Schema::create('menu_calendar_schedule_meals', function (Blueprint $table) {
            $table->id();



            // 1: scheduleDate - isDefault
            $table->date('scheduleDate')->nullable();
            $table->boolean('isDefault')->nullable()->default(0);


            // 1.2: mealType - meal
            $table->bigInteger('mealTypeId')->unsigned()->nullable();
            $table->foreign('mealTypeId')->references('id')->on('meal_types')->onDelete('cascade');


            $table->bigInteger('mealId')->unsigned()->nullable();
            $table->foreign('mealId')->references('id')->on('meals')->onDelete('cascade');




            // 1.3: calendarSchedule - calendar
            $table->bigInteger('menuCalendarScheduleId')->unsigned()->nullable();
            $table->foreign('menuCalendarScheduleId')->references('id')->on('menu_calendar_schedules')->onDelete('cascade');


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
        Schema::dropIfExists('menu_calendar_schedule_meals');
    }
};
