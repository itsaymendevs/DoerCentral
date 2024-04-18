<?php

namespace App\Livewire\Dashboard\Menu\Calendars\SingleCalendar\Components;

use App\Models\MenuCalendarSchedule;
use App\Models\MenuCalendarScheduleMeal;
use App\Traits\CalendarTrait;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;

class SingleCalendarView extends Component
{

    use HelperTrait;
    use CalendarTrait;



    // :: variables
    public $searchFromDate = '';
    public $menuCalendarId;




    public function mount($id)
    {


        // :: params
        $this->menuCalendarId = $id;


    } // end function




    // -----------------------------------------------------------






    public function changeWeek($direction)
    {



        // :: getWeeks
        $weeks = $this->getWeeksOptions();



        // :: loop - weeks
        foreach ($weeks as $key => $week) {


            // 1: previousWeek
            $this->searchFromDate == $week && $direction == 'previous' && ! empty($weeks[$key - 1]) ?
                $this->searchFromDate = $weeks[$key - 1] : null;


            // 2: nextWeek
            $this->searchFromDate == $week && $direction == 'next' && ! empty($weeks[$key + 1]) ?
                $this->searchFromDate = $weeks[$key + 1] : null;


        } // end loop





    } // end function








    // -----------------------------------------------------------








    #[On('refreshViews')]
    public function render()
    {


        // 1: dependencies
        $weeks = $this->getWeeksOptions();



        // 1.2: fromDate - weekDates
        $this->searchFromDate == '' ? $this->searchFromDate = $this->getCurrentDate() : null;
        $weekDates = $this->getWeekDates($this->searchFromDate);





        // 1.2: get schedules - scheduleMeals
        $scheduleMeals = MenuCalendarScheduleMeal::where('menuCalendarId', $this->menuCalendarId)
            ->where('scheduleDate', '>=', $this->searchFromDate)
            ->where('scheduleDate', '<=', end($weekDates))
            ->orderBy('scheduleDate')
            ->get();






        // :: initTooltips
        $this->dispatch('initTooltips');




        return view('livewire.dashboard.menu.calendars.single-calendar.components.single-calendar-view', compact('weeks', 'scheduleMeals', 'weekDates'));



    } // end function


} // end class


