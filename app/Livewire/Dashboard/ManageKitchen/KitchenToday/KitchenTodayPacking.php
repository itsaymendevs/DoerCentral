<?php

namespace App\Livewire\Dashboard\ManageKitchen\KitchenToday;

use App\Models\Customer;
use App\Models\CustomerSubscription;
use App\Models\CustomerSubscriptionSchedule;
use App\Models\CustomerSubscriptionScheduleMeal;
use App\Models\MealType;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;
use stdClass;

class KitchenTodayPacking extends Component
{




    use HelperTrait;



    // :: variables
    public $searchScheduleDate, $searchCustomer;




    public function mount()
    {


        // :: init
        $this->searchScheduleDate = $this->getCurrentDate();



    } // end function











    // -----------------------------------------------------------







    public function packMeal()
    {





        // 1: params - confirmationBox
        // $this->makeAlert('question', 'Mark this meal as cooked?', 'confirmMealPacking');





    } // end function










    // -----------------------------------------------------------









    #[On('confirmMealPacking')]
    public function confirmMealPacking()
    {







    } // end function














    // -----------------------------------------------------------








    public function render()
    {



        // 1: dependencies
        $mealTypes = MealType::all();



        // 1.2: getCustomersByFilter
        $customers = Customer::where('firstName', 'LIKE', '%' . $this->searchCustomer . '%')
            ->orWhere('lastName', 'LIKE', '%' . $this->searchCustomer . '%')?->pluck('id')->toArray();
        $subscriptions = CustomerSubscription::whereIn('customerId', $customers)->pluck('id')->toArray();










        // 2: getSchedules - meals
        $schedules = CustomerSubscriptionSchedule::where('scheduleDate', $this->searchScheduleDate)
            ->whereIn('status', ['Pending', 'Completed'])?->pluck('id')->toArray() ?? [];




        $scheduleMeals = CustomerSubscriptionScheduleMeal::whereNotNull('mealId')
            ->whereIn('subscriptionScheduleId', $schedules)
            ->whereIn('customerSubscriptionId', $subscriptions)
            ->where('cookStatus', 'Cooked')
            ->orderBy('customerSubscriptionId')
            ->get();









        return view('livewire.dashboard.manage-kitchen.kitchen-today.kitchen-today-packing', compact('scheduleMeals', 'mealTypes'));




    } // end function



} // end class


