<?php

namespace App\Livewire\Dashboard\Customers\Manage;

use App\Models\Customer;
use App\Models\CustomerSubscriptionSchedule;
use App\Models\CustomerSubscriptionScheduleReplacement;
use App\Models\MealType;
use App\Models\MenuCalendar;
use App\Models\MenuCalendarScheduleMeal;
use App\Traits\HelperTrait;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\On;
use Livewire\Component;
use stdClass;

class SingleCustomerMenu extends Component
{


    use HelperTrait;




    // :: variables
    public $customer, $subscription;
    public $menuCalendarId, $scheduleDate;
    public $skipStatus;






    public function mount($id)
    {


        // :: getCustomer - subscription
        $this->customer = Customer::find($id);
        $this->subscription = $this->customer?->latestSubscription();



        // 1.2: menuCalendar
        $this->menuCalendarId = $this->subscription?->menuCalendarId ?? null;









        // 1.3: scheduleDate
        if (session('customerScheduleDate') && session('customerScheduleDate') >= $this->subscription->startDate && session('customerScheduleDate') <= $this->subscription->untilDate) {


            $this->scheduleDate = session('customerScheduleDate');


        } else {


            Session::put('customerScheduleDate', $this->subscription->startDate);
            $this->scheduleDate = $this->subscription->startDate;


        } // end if









        // -------------------------------
        // -------------------------------







        // 1.3: skipStatus
        $this->skipStatus = $this->subscription->deliveries?->where('deliveryDate', $this->scheduleDate)?->first()?->status ?? 'Skipped';






    } // end function











    // -----------------------------------------------------------







    public function changeScheduleDate($scheduleDate)
    {



        // :: scheduleDateSession
        Session::put('customerScheduleDate', $scheduleDate);

        return $this->redirect(route('dashboard.singleCustomerMenu', [$this->customer->id]), navigate: true);




    } // end function










    // -----------------------------------------------------------







    public function skipScheduleDay()
    {



        // 1: create instance
        $instance = new stdClass();

        $instance->scheduleDate = $this->scheduleDate;
        $instance->customerSubscriptionId = $this->subscription->id;






        // 1.2: makeRequest
        $response = $this->makeRequest('dashboard/customers/menu/schedule/skip', $instance);




        // 1.3: updateSkipStatus - alert
        $this->skipStatus = 'Skipped';

        $this->makeAlert('success', $response?->message);





    } // end function










    // -----------------------------------------------------------










    public function editRemarks($id)
    {


        // 1: dispatchId
        $this->dispatch('editRemarks', $id);


    } // end function










    // -----------------------------------------------------------







    public function replaceMeal($scheduleMealId)
    {




        // 1: dispatchId
        $this->dispatch('replaceMeal', $scheduleMealId);



    } // end function











    // -----------------------------------------------------------







    public function replaceMealForReplacement($replacementId, $mealTypeId)
    {




        // 1: getScheduleMeal
        $scheduleMealId = MenuCalendarScheduleMeal::where('scheduleDate', $this->scheduleDate)
            ->where('mealTypeId', $mealTypeId)?->first()->id;



        // 1: dispatchIfFound
        if ($scheduleMealId) {

            $this->dispatch('replaceMeal', $scheduleMealId);

        } else {

            $this->makeAlert('info', 'No Replacements Available');

        } // end if



    } // end function














    // -----------------------------------------------------------










    public function viewExcludes($id)
    {


        // 1: dispatchId
        $this->dispatch('viewExcludes', $id);


    } // end function











    // -----------------------------------------------------------








    public function changeMeal($mealId, $mealTypeId)
    {


        // 1: create instance
        $instance = new stdClass();

        $instance->mealId = $mealId;
        $instance->mealTypeId = $mealTypeId;
        $instance->scheduleDate = $this->scheduleDate;
        $instance->customerSubscriptionId = $this->subscription->id;






        // 1.2: makeRequest
        $response = $this->makeRequest('dashboard/customers/menu/meals/change', $instance);



        // 1.3: alert
        $this->makeAlert('success', $response?->message);
        $this->render();





    } // end function











    // -----------------------------------------------------------











    #[On('refreshViews')]
    public function render()
    {


        // 1: dependencies
        $menuCalendars = MenuCalendar::where('isActive', true)->get();
        $mealTypes = MealType::whereIn('id', $this->subscription->typesInArray())->get();







        // 1.2: datesUntilSubscription
        $daysCounter = 0;
        $datesUntilSubscription = [];




        // :: loop - datesUntilSubscription
        while (true) {



            // 1.3: getDate - checkDate
            $scheduleDate = date('Y-m-d', strtotime($this->subscription->startDate . "+{$daysCounter} days"));

            if ($scheduleDate > $this->subscription->untilDate)
                break;





            // 1.4: getDates - untilSubscription
            $datesUntilSubscription[$scheduleDate] = CustomerSubscriptionSchedule::where('customerSubscriptionId', $this->subscription->id)
                ->where('scheduleDate', $scheduleDate)?->first()?->meals?->count() ?? 0;





            // :: increaseCounter
            $daysCounter++;



        } // end loop








        // --------------------------------------
        // --------------------------------------








        // 2: subscription - schedule / scheduleMeals
        $subscriptionSchedule = CustomerSubscriptionSchedule::where('customerSubscriptionId', $this->subscription->id)->where('scheduleDate', $this->scheduleDate)?->first();


        $subscriptionScheduleMeals = $subscriptionSchedule?->meals ?? [];







        // ------------------





        // 3: subscription - schedule / replacements
        $subscriptionScheduleReplacements = CustomerSubscriptionScheduleReplacement::where('customerSubscriptionId', $this->subscription->id)->where('scheduleDate', $this->scheduleDate)?->get();


        $replacedMeals = $subscriptionScheduleReplacements?->pluck('mealId')?->toArray() ?? [];
        $replacementMeals = $subscriptionScheduleReplacements?->pluck('replacementId')?->toArray() ?? [];







        // ------------------






        // 4: calendar - scheduleMeals
        $calendarScheduleMeals = MenuCalendarScheduleMeal::where('menuCalendarScheduleId', $subscriptionSchedule?->menuCalendarScheduleId)
            ->where('scheduleDate', $this->scheduleDate)
            ->whereNotIn('mealId', $replacedMeals)
            ->whereNotIn('mealId', $replacementMeals)
            ->get();












        // --------------------------------------
        // --------------------------------------










        // 5: getSize - byMealType
        $sizesByMealType = [];

        foreach ($mealTypes as $mealType) {


            // 4.1: getSize
            $sizesByMealType[$mealType->id] = $subscriptionScheduleMeals ? $subscriptionScheduleMeals?->where('mealTypeId', $mealType->id)?->first()?->size : null;


        } // end loop










        // 5.5: getDelivery
        $deliveryStatus = $this->subscription->deliveries?->where('deliveryDate', $this->scheduleDate)?->first()?->status ?? 'No Delivery';







        // :: initTooltips
        $this->dispatch('initTooltips');




        return view('livewire.dashboard.customers.manage.single-customer-menu', compact('menuCalendars', 'mealTypes', 'datesUntilSubscription', 'calendarScheduleMeals', 'subscriptionScheduleReplacements', 'subscriptionScheduleMeals', 'sizesByMealType', 'deliveryStatus'));




    } // end function




} // end class
