<?php

namespace App\Livewire\Dashboard\Menu\Calendars\SingleCalendar\Components;

use App\Models\MenuCalendarSchedule;
use App\Models\MenuCalendarScheduleMeal;
use App\Traits\CalendarTrait;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;
use stdClass;

class SingleCalendarView extends Component
{

    use HelperTrait;
    use CalendarTrait;



    // :: variables
    public $menuCalendarId, $searchFromDate = '';





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






    public function changeDefault($id)
    {



        // 1: params - confirmationBox
        $this->temporaryId = $id;

        $this->makeAlert('question', 'Change to Default?', 'confirmChangeDefault');




    } // end function







    // -----------------------------------------------------------







    #[On('confirmChangeDefault')]
    public function confirmChangeDefault()
    {




        // 1: checkID
        if ($this->temporaryId) {



            // 1.2: create instance
            $instance = new stdClass();
            $instance->id = $this->temporaryId;




            // 1.3: makeRequest
            $response = $this->makeRequest('dashboard/menu/calendars/schedules/meals/update-default', $instance);


            $this->render();
            $this->makeAlert('success', $response->message);



        } // end if






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
            ->orderBy('mealTypeId')
            ->orderBy('scheduleDate')
            ->get();






        // :: initTooltips
        $this->dispatch('initTooltips');




        return view('livewire.dashboard.menu.calendars.single-calendar.components.single-calendar-view', compact('weeks', 'scheduleMeals', 'weekDates'));



    } // end function


} // end class


