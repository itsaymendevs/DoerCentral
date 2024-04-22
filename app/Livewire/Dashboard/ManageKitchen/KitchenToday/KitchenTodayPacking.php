<?php

namespace App\Livewire\Dashboard\ManageKitchen\KitchenToday;

use App\Models\Bag;
use App\Models\Customer;
use App\Models\CustomerSubscription;
use App\Models\CustomerSubscriptionSchedule;
use App\Models\CustomerSubscriptionScheduleMeal;
use App\Models\MealType;
use App\Models\Size;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;
use stdClass;

class KitchenTodayPacking extends Component
{




    use HelperTrait;



    // :: variables
    public $searchScheduleDate, $searchSize, $searchCustomer;
    public $customerSubscriptionId;




    public function mount()
    {


        // :: init
        $this->searchScheduleDate = $this->getCurrentDate();



    } // end function











    // -----------------------------------------------------------







    public function packMeals($customerSubscriptionId)
    {




        // 1: params - confirmationBox
        $this->customerSubscriptionId = $customerSubscriptionId;



        $this->makeAlert('question', 'Mark meals as packed?', 'confirmMealsPacking');






    } // end function










    // -----------------------------------------------------------









    #[On('confirmMealsPacking')]
    public function confirmMealsPacking()
    {





        // 1: remove
        if ($this->customerSubscriptionId) {



            // 1: create instance
            $instance = new stdClass();

            $instance->scheduleDate = $this->searchScheduleDate;
            $instance->customerSubscriptionId = $this->customerSubscriptionId;




            // 1.2: makeRequest
            $response = $this->makeRequest('dashboard/kitchen/production/meals/pack', $instance);





            // :: render - reset
            $this->customerSubscriptionId = null;
            $this->makeAlert('success', $response->message);



        } // end if










    } // end function














    // -----------------------------------------------------------








    public function render()
    {



        // 1: dependencies
        $sizes = Size::all();
        $mealTypes = MealType::all();
        $bag = Bag::whereIn('name', ['Cool Bag', 'Cooler Bag'])->first();






        // 1.2: getCustomersByFilter
        $customers = Customer::where('firstName', 'LIKE', '%' . $this->searchCustomer . '%')
            ->orWhere('lastName', 'LIKE', '%' . $this->searchCustomer . '%')?->pluck('id')->toArray();
        $subscriptions = CustomerSubscription::whereIn('customerId', $customers)->pluck('id')->toArray();










        // 2: getSchedules - meals
        $schedules = CustomerSubscriptionSchedule::where('scheduleDate', $this->searchScheduleDate)
            ->whereIn('status', ['Pending', 'Completed'])?->pluck('id')->toArray() ?? [];




        $scheduleMeals = CustomerSubscriptionScheduleMeal::whereNotNull('mealId')
            ->whereIn('subscriptionScheduleId', $schedules)
            ->whereIn('sizeId', $this->searchSize ? [$this->searchSize] : $sizes->pluck('id')->toArray())
            ->whereIn('customerSubscriptionId', $subscriptions)
            ->whereIn('cookStatus', ['Cooked', 'Packed'])
            ->orderBy('customerSubscriptionId')
            ->get();








        return view('livewire.dashboard.manage-kitchen.kitchen-today.kitchen-today-packing', compact('scheduleMeals', 'mealTypes', 'bag', 'sizes'));




    } // end function



} // end class


