<?php

namespace App\Livewire\Dashboard\ManageKitchen\KitchenToday;

use App\Models\CustomerSubscriptionSchedule;
use App\Models\CustomerSubscriptionScheduleMeal;
use App\Models\MealType;
use App\Traits\HelperTrait;
use Livewire\Component;

class KitchenTodayProduction extends Component
{


    use HelperTrait;



    // :: variables
    public $searchScheduleDate, $searchMealType;





    public function mount()
    {


        // :: init
        $this->searchScheduleDate = $this->getCurrentDate();



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
            ->where('subscriptionScheduleId', $schedules)
            ->whereIn('mealTypeId', $this->searchMealType ? [$this->searchMealType] : $mealTypes->pluck('id')->toArray())
            ->orderBy('mealTypeId')->get();









        return view('livewire.dashboard.manage-kitchen.kitchen-today.kitchen-today-production', compact('scheduleMeals', 'mealTypes'));




    } // end function



} // end class
