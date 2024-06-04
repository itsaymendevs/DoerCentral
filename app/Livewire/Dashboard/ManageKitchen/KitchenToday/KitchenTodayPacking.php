<?php

namespace App\Livewire\Dashboard\ManageKitchen\KitchenToday;

use App\Exports\KitchenPackingExport;
use App\Models\Bag;
use App\Models\Customer;
use App\Models\CustomerSubscription;
use App\Models\CustomerSubscriptionDelivery;
use App\Models\CustomerSubscriptionSchedule;
use App\Models\CustomerSubscriptionScheduleMeal;
use App\Models\MealType;
use App\Models\Size;
use App\Models\VersionPermission;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;
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







    public function export()
    {




        // 1: prepareExportData




        // 1.2: dependencies
        $sizes = Size::all();
        $versionPermission = VersionPermission::first();





        // 1.2: getCustomersByFilter
        $customers = Customer::where('firstName', 'LIKE', '%' . $this->searchCustomer . '%')
            ->orWhere('lastName', 'LIKE', '%' . $this->searchCustomer . '%')?->pluck('id')->toArray();
        $subscriptions = CustomerSubscription::whereIn('customerId', $customers)->pluck('id')->toArray();










        // 2: getSchedules - meals
        $schedules = CustomerSubscriptionSchedule::where('scheduleDate', $this->searchScheduleDate)
            ->whereIn('status', ['Pending', 'Completed'])?->pluck('id')->toArray() ?? [];







        // 3: ScheduleMeals


        // :: permission - hasConfirmCooking
        if ($versionPermission->kitchenModuleHasConfirmCooking) {


            $scheduleMeals = CustomerSubscriptionScheduleMeal::whereNotNull('mealId')
                ->whereIn('subscriptionScheduleId', $schedules)
                ->whereIn('sizeId', $this->searchSize ? [$this->searchSize] : $sizes->pluck('id')->toArray())
                ->whereIn('customerSubscriptionId', $subscriptions)
                ->whereIn('cookStatus', ['Cooked', 'Packed'])
                ->orderBy('customerSubscriptionId')
                ->get();




            // :: withoutCookingAction
        } else {


            $scheduleMeals = CustomerSubscriptionScheduleMeal::whereNotNull('mealId')
                ->whereIn('subscriptionScheduleId', $schedules)
                ->whereIn('sizeId', $this->searchSize ? [$this->searchSize] : $sizes->pluck('id')->toArray())
                ->whereIn('customerSubscriptionId', $subscriptions)
                ->orderBy('customerSubscriptionId')
                ->get();


        } // end if - permission








        // ---------------------------------------
        // ---------------------------------------









        // 2: makeExport
        if ($scheduleMeals->count() > 0) {


            return Excel::download(new KitchenPackingExport($scheduleMeals), 'kitchen-packing.xlsx');



            // :: no-packing
        } else {



            $this->makeAlert('info', 'Packing-list is empty');


        } // end if







    } // end function














    // -----------------------------------------------------------








    public function render()
    {



        // 1: dependencies
        $sizes = Size::all();
        $mealTypes = MealType::all();
        $versionPermission = VersionPermission::first();
        $bag = Bag::whereIn('name', ['Cool Bag', 'Cooler Bag'])->first();






        // 1.2: getCustomersByFilter
        $customers = Customer::where('firstName', 'LIKE', '%' . $this->searchCustomer . '%')
            ->orWhere('lastName', 'LIKE', '%' . $this->searchCustomer . '%')?->pluck('id')->toArray();
        $subscriptions = CustomerSubscription::whereIn('customerId', $customers)->pluck('id')->toArray();









        // 2: getDeliveries
        $customers = CustomerSubscriptionDelivery::where('deliveryDate', $this->searchScheduleDate)?->pluck('customerId')?->toArray() ?? [];






        // 2.1: getSchedules - meals
        $schedules = CustomerSubscriptionSchedule::where('scheduleDate', $this->searchScheduleDate)
            ->whereIn('customerId', $customers)
            ->whereIn('status', ['Pending', 'Completed'])?->pluck('id')->toArray() ?? [];







        // 3: ScheduleMeals


        // :: permission - hasConfirmCooking
        if ($versionPermission->kitchenModuleHasConfirmCooking) {




            $scheduleMeals = CustomerSubscriptionScheduleMeal::whereNotNull('mealId')
                ->whereIn('subscriptionScheduleId', $schedules)
                ->whereIn('sizeId', $this->searchSize ? [$this->searchSize] : $sizes->pluck('id')->toArray())
                ->whereIn('customerSubscriptionId', $subscriptions)
                ->whereIn('cookStatus', ['Cooked', 'Packed'])
                ->orderBy('customerSubscriptionId')
                ->get();



            // :: withoutCookingAction
        } else {




            $scheduleMeals = CustomerSubscriptionScheduleMeal::whereNotNull('mealId')
                ->whereIn('subscriptionScheduleId', $schedules)
                ->whereIn('sizeId', $this->searchSize ? [$this->searchSize] : $sizes->pluck('id')->toArray())
                ->whereIn('customerSubscriptionId', $subscriptions)
                ->orderBy('customerSubscriptionId')
                ->get();



        } // end if - permission












        return view('livewire.dashboard.manage-kitchen.kitchen-today.kitchen-today-packing', compact('scheduleMeals', 'mealTypes', 'bag', 'sizes'));




    } // end function



} // end class


