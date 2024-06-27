<?php

namespace App\Livewire\Dashboard\ManageKitchen\KitchenToday;

use App\Models\CustomerSubscriptionDelivery;
use App\Models\CustomerSubscriptionSchedule;
use App\Models\CustomerSubscriptionScheduleMeal;
use App\Models\Label;
use App\Models\MealType;
use App\Models\Size;
use App\Traits\HelperTrait;
use Livewire\Component;

class KitchenTodayLabel extends Component
{





    use HelperTrait;



    // :: variables
    public $searchScheduleDate, $searchMealType;




    public function mount()
    {


        // :: init
        $this->searchScheduleDate = $this->getCurrentDate();
        $this->searchMealType = MealType::first()->id;



    } // end function









    // -----------------------------------------------------------





    public function labelPrint($scheduleMealsByMeal)
    {



        // :: dispatchEvent
        $this->dispatch('labelPrint', $scheduleMealsByMeal, $this->searchScheduleDate);


    } // end function











    // -----------------------------------------------------------





    public function labelPrintAll()
    {



        // 1: dependencies
        $mealTypes = MealType::all();






        // 2: getDeliveries
        $customers = CustomerSubscriptionDelivery::where('deliveryDate', $this->searchScheduleDate)?->pluck('customerId')?->toArray() ?? [];





        // 2.1: getSchedules - meals
        $schedules = CustomerSubscriptionSchedule::where('scheduleDate', $this->searchScheduleDate)
            ->whereIn('customerId', $customers)
            ->whereIn('status', ['Pending', 'Completed'])?->pluck('id')->toArray() ?? [];








        $scheduleMeals = CustomerSubscriptionScheduleMeal::whereNotNull('mealId')
            ->whereIn('subscriptionScheduleId', $schedules)
            ->whereIn('mealTypeId', $this->searchMealType ? [$this->searchMealType] : $mealTypes->pluck('id')->toArray())
            ->orderBy('mealId')
            ->get();







        // :: dispatchEvent
        $this->dispatch('labelPrint', $scheduleMeals, $this->searchScheduleDate);


    } // end function











    // -----------------------------------------------------------








    public function render()
    {



        // 1: dependencies
        $mealTypes = MealType::all();
        $label = Label::first();







        // 2: getDeliveries
        $deliveries = CustomerSubscriptionDelivery::where('deliveryDate', $this->searchScheduleDate)
            ->whereIn('status', ['Pending', 'Completed'])?->pluck('id')->toArray() ?? [];





        // 2.1: getSchedules - meals
        $schedules = CustomerSubscriptionSchedule::where('scheduleDate', $this->searchScheduleDate)
            ->whereIn('customerSubscriptionDeliveryId', $deliveries)
            ->pluck('id')->toArray() ?? [];





        $scheduleMeals = CustomerSubscriptionScheduleMeal::whereNotNull('mealId')
            ->whereIn('subscriptionScheduleId', $schedules)
            ->whereIn('mealTypeId', $this->searchMealType ? [$this->searchMealType] : $mealTypes->pluck('id')->toArray())
            ->orderBy('mealTypeId')
            ->get();









        // :: initTooltips
        $this->dispatch('initTooltips');




        return view('livewire.dashboard.manage-kitchen.kitchen-today.kitchen-today-label', compact('scheduleMeals', 'mealTypes', 'label'));




    } // end function



} // end class
