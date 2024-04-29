<?php

namespace App\Livewire\Dashboard\Menu\Calendars\SingleCalendar\Components;

use App\Livewire\Forms\MenuCalendarScheduleForm;
use App\Models\Meal;
use App\Models\MealType;
use App\Models\MenuCalendarSchedule;
use App\Models\MenuCalendarScheduleMeal;
use App\Models\Type;
use App\Traits\HelperTrait;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;
use stdClass;

class SingleCalendarEdit extends Component
{

    use HelperTrait;
    use WithPagination;




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
                $instance->isDefaultSecond = $meal->isDefaultSecond;
                $instance->isDefaultThird = $meal->isDefaultThird;
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








    public function include($mealTypeId, $mealId)
    {




        // :: check if exists
        $isFound = false;


        foreach (collect($this->instance->scheduleMeals ?? [])?->where('mealTypeId', $mealTypeId)?->where('mealId', $mealId) ?? [] as $key => $scheduleMeal) {


            // 1: isFound - remove
            $isFound = true;
            unset($this->instance->scheduleMeals[$key]);

            // 1.2: unCheckDefault
            $this->dispatch('unCheckDefault', card: "#item-{$scheduleMeal->mealTypeId}-{$scheduleMeal->mealId}");

            break;



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
            $instance->isDefaultSecond = false;
            $instance->isDefaultThird = false;
            $instance->menuCalendarScheduleId = $this->instance->menuCalendarScheduleId;


            array_push($this->instance->scheduleMeals, $instance);





            // 2.2: unCheckDefault
            $this->dispatch('unCheckDefault', card: "#item-{$instance->mealTypeId}-{$instance->mealId}");


        } // end if











    } // end function











    // -----------------------------------------------------------








    public function toggle($mealTypeId, $mealId, $isDefaultGroup)
    {




        // 1: get instance
        foreach (collect($this->instance->scheduleMeals ?? [])->where('mealTypeId', $mealTypeId) ?? [] as $key => $scheduleMeal) {



            // 1.2: removeDefaultFromAll
            $this->instance->scheduleMeals[$key]->{$isDefaultGroup} = false;






            // 1.3:  makeTargetDefault
            if ($scheduleMeal->mealId == $mealId && $scheduleMeal->mealTypeId == $mealTypeId) {

                $this->instance->scheduleMeals[$key]->{$isDefaultGroup} = true;

            } //end if




        } // end loop



    } // end function









    // -----------------------------------------------------------






    public function render()
    {


        // 1: dependencies
        $mealTypes = MealType::all();
        $totalMeals = Meal::where('name', 'LIKE', '%' . $this->searchMeal . '%')->count();





        // 1.2: separate into collections
        $stock = new stdClass();


        foreach ($mealTypes as $mealType) {



            // ** BreakfastMeals / LunchMeals etc. **





            // 1.2.1: Recipe Type
            if ($mealType->type->name == 'Recipe') {



                // :: extra: filter => mealType
                $stock->{$mealType->name . 'Meals'} = Meal::whereHas('types', function ($query) use ($mealType) {
                    $query->whereIn('mealTypeId', [$mealType->id]);
                })
                    ->where('name', 'LIKE', '%' . $this->searchMeal . '%')
                    ->where('typeId', $mealType->type->id)
                    ->paginate(8, pageName: $mealType->name);





                // :: 1.2.2: others
            } else {



                $stock->{$mealType->name . 'Meals'} = Meal::where('name', 'LIKE', '%' . $this->searchMeal . '%')
                    ->where('typeId', $mealType->type->id)
                    ->paginate(8, pageName: $mealType->name);


            } // end if





        } // end loop








        return view('livewire.dashboard.menu.calendars.single-calendar.components.single-calendar-edit', compact('mealTypes', 'totalMeals', 'stock'));



    } // end function


} // end class


