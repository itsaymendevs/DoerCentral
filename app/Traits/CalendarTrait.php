<?php

namespace App\Traits;

use stdClass;


trait CalendarTrait
{




    protected function getWeeksOptions()
    {

        // :: root
        $weeks = [];
        $currentDate = date('Y-m-d', strtotime('+4 hours'));



        // 1: getUpcomingWeeks
        for ($i = 0; $i < 5; $i++)
            array_push($weeks, date('Y-m-d', strtotime($currentDate . '+' . $i . ' week')));


        return $weeks;


    } // end function








    // --------------------------------------------------------------
    // --------------------------------------------------------------
    // --------------------------------------------------------------








    protected function getWeekDates($currentDate)
    {


        // :: root
        $weekDates = [];


        // 1: getWeekDates
        for ($i = 0; $i < 7; $i++)
            array_push($weekDates, date('Y-m-d', strtotime($currentDate . '+' . $i . ' days')));



        return $weekDates;


    } // end function







} // end trait

