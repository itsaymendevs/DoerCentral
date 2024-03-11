<?php

namespace App\Livewire\Dashboard\Menu\Calendars\SingleCalendar\Components;

use App\Livewire\Forms\MenuCalendarScheduleForm;
use App\Models\Meal;
use App\Models\MealType;
use App\Models\MenuCalendarSchedule;
use App\Models\MenuCalendarScheduleMeal;
use App\Traits\HelperTrait;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\On;
use Livewire\Component;
use stdClass;

class SingleCalendarEdit extends Component
{

    use HelperTrait;



    // :: variables
    public MenuCalendarScheduleForm $instance;
    public $scheduleMeals;
    public $searchMeal = '';









    public function mount($id)
    {


        // :: params
        $this->instance->menuCalendarId = $id;
        $this->instance->scheduleDate = session('scheduleDate') ?? $this->getCurrentDate();


        // :: initScheduleMeals
        $this->init();


    } // end function







    // -----------------------------------------------------------







    #[On('refreshScheduleMeals')]
    public function init()
    {


        // 1: check if schedule exists
        $calendarSchedule = MenuCalendarSchedule::where('menuCalendarId', $this->instance->menuCalendarId)
            ->where('scheduleDate', $this->instance->scheduleDate)
            ->first();





        if (! $calendarSchedule) {

            // 1.2: makeRequest
            $response = $this->makeRequest('dashboard/menu/calendars/schedules/store', $this->instance);

            $this->init();

        } // end if





        // -----------------
        // -----------------






        // 2: get menuCalendarScheduleId - scheduleMeals
        if ($calendarSchedule) {

            $this->instance->menuCalendarScheduleId = $calendarSchedule->id;
            $this->scheduleMeals = $calendarSchedule?->meals;






            // :: reset & cloneMeals
            $this->instance->reset('scheduleMeals');

            foreach ($calendarSchedule?->meals as $meal) {


                // :: create instance
                $instance = new stdClass();

                $instance->mealId = $meal->mealId;
                $instance->mealTypeId = $meal->mealTypeId;
                $instance->isDefault = $meal->isDefault;
                $instance->menuCalendarScheduleId = $meal->menuCalendarScheduleId;



                array_push($this->instance->scheduleMeals, $instance);


            } // end loop

        } // end if




    } // end function








    // -----------------------------------------------------------







    public function changeScheduleDate()
    {



        // :: scheduleDateSession
        Session::put('scheduleDate', $this->instance->scheduleDate);

        return $this->redirect(route('dashboard.menuSingleCalendar', [$this->instance->menuCalendarId]), navigate: true);




    } // end function









    // --------------------------------------------------------







    public function update()
    {


        // 1: makeRequest
        $response = $this->makeRequest('dashboard/menu/calendars/schedules/meals/update', $this->instance);


        $this->init();
        $this->dispatch('refreshViews');
        $this->makeAlert('success', $response->message);


    } // end function











    // -----------------------------------------------------------








    public function include($mealTypeId, $mealId, )
    {


        // :: check if exists
        $isFound = false;


        foreach ($this->instance->scheduleMeals as $key => $scheduleMeal) {


            // 1: isFound - remove
            if ($scheduleMeal->mealId == $mealId && $scheduleMeal->mealTypeId == $mealTypeId) {

                $isFound = true;
                unset($this->instance->scheduleMeals[$key]);

            } // end if

        } // end loop







        // ------------------------------
        // ------------------------------





        // 2: if isNotFound - create
        if (! $isFound) {


            // :: create instance
            $instance = new stdClass();

            $instance->mealId = $mealId;
            $instance->mealTypeId = $mealTypeId;
            $instance->isDefault = false;
            $instance->menuCalendarScheduleId = $this->instance->menuCalendarScheduleId;


            array_push($this->instance->scheduleMeals, $instance);



        } // end if




    } // end function











    // -----------------------------------------------------------








    public function toggle($mealTypeId, $mealId)
    {




        // 1: get instance
        foreach ($this->instance->scheduleMeals as $key => $scheduleMeal) {



            // 1.2: makeNotDefault - others
            if ($scheduleMeal->mealTypeId == $mealTypeId) {

                $this->instance->scheduleMeals[$key]->isDefault = false;

            } //end if





            // 1.3:  makeDefault
            if ($scheduleMeal->mealId == $mealId && $scheduleMeal->mealTypeId == $mealTypeId) {

                $this->instance->scheduleMeals[$key]->isDefault = true;

            } //end if




        } // end loop



    } // end function









    // -----------------------------------------------------------






    public function render()
    {


        // 1: dependencies
        $mealTypes = MealType::all();
        $meals = Meal::where('name', 'LIKE', '%' . $this->searchMeal . '%')->get();




        // :: initTooltips
        $this->dispatch('initTooltips');




        return view('livewire.dashboard.menu.calendars.single-calendar.components.single-calendar-edit', compact('mealTypes', 'meals'));



    } // end function


} // end class


