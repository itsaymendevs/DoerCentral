<?php

namespace App\Livewire\Dashboard\ManageKitchen\KitchenToday;

use App\Exports\KitchenProductionExport;
use App\Models\CustomerSubscriptionSchedule;
use App\Models\CustomerSubscriptionScheduleMeal;
use App\Models\MealType;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;
use stdClass;



class KitchenTodayProduction extends Component
{


    use HelperTrait;



    // :: variables
    public $searchScheduleDate, $searchMealType;
    public $cookMealId, $cookMealTypeId;




    public function mount()
    {


        // :: init
        $this->searchScheduleDate = $this->getCurrentDate();



    } // end function








    // -----------------------------------------------------------







    public function viewPart($id)
    {



        // :: dispatchEvent
        $this->dispatch('viewPart', $id);


    } // end function









    // -----------------------------------------------------------







    public function cookMeal($mealTypeId, $mealId)
    {





        // 1: params - confirmationBox
        $this->cookMealId = $mealId;
        $this->cookMealTypeId = $mealTypeId;



        $this->makeAlert('question', 'Mark this meal as cooked?', 'confirmMealCooking');





    } // end function










    // -----------------------------------------------------------









    #[On('confirmMealCooking')]
    public function confirmMealCooking()
    {



        // 1: remove
        if ($this->cookMealId && $this->cookMealTypeId) {



            // 1: create instance
            $instance = new stdClass();

            $instance->mealId = $this->cookMealId;
            $instance->mealTypeId = $this->cookMealTypeId;





            // 1.2: makeRequest
            $response = $this->makeRequest('dashboard/kitchen/production/meals/cook', $instance);


            // :: render - reset
            $this->cookMealId = null;
            $this->cookMealTypeId = null;

            $this->makeAlert('success', $response->message);



        } // end if





    } // end function


















    // -----------------------------------------------------------







    public function export()
    {




        // 1: prepareExportData




        // 1.2: getMealTypes
        $mealTypes = MealType::all();







        // 2: getSchedules - meals
        $schedules = CustomerSubscriptionSchedule::where('scheduleDate', $this->searchScheduleDate)
            ->whereIn('status', ['Pending', 'Completed'])?->pluck('id')->toArray() ?? [];




        $scheduleMeals = CustomerSubscriptionScheduleMeal::whereNotNull('mealId')
            ->whereIn('subscriptionScheduleId', $schedules)
            ->whereIn('mealTypeId', $this->searchMealType ? [$this->searchMealType] : $mealTypes->pluck('id')->toArray())
            ->orderBy('mealTypeId')->get();








        // ---------------------------------------
        // ---------------------------------------









        // 2: makeExport
        if ($scheduleMeals->count() > 0) {


            return Excel::download(new KitchenProductionExport($scheduleMeals), 'kitchen-production.xlsx');



            // :: no-production
        } else {



            $this->makeAlert('info', 'Production-list is empty');


        } // end if







    } // end function







    // -----------------------------------------------------------








    public function render()
    {



        // 1: dependencies
        $mealTypes = MealType::all();








        // 2: getSchedules - meals
        $schedules = CustomerSubscriptionSchedule::where('scheduleDate', $this->searchScheduleDate)
            ->whereIn('status', ['Pending', 'Completed'])?->pluck('id')->toArray() ?? [];




        $scheduleMeals = CustomerSubscriptionScheduleMeal::whereNotNull('mealId')
            ->whereIn('subscriptionScheduleId', $schedules)
            ->whereIn('mealTypeId', $this->searchMealType ? [$this->searchMealType] : $mealTypes->pluck('id')->toArray())
            ->orderBy('mealTypeId')->get();









        return view('livewire.dashboard.manage-kitchen.kitchen-today.kitchen-today-production', compact('scheduleMeals', 'mealTypes'));




    } // end function



} // end class
