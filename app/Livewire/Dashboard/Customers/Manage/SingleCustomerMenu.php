<?php

namespace App\Livewire\Dashboard\Customers\Manage;

use App\Models\Customer;
use App\Models\CustomerSubscriptionSchedule;
use App\Models\MealType;
use App\Models\MenuCalendar;
use App\Models\MenuCalendarScheduleMeal;
use App\Traits\HelperTrait;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class SingleCustomerMenu extends Component
{


    use HelperTrait;




    // :: variables
    public $customer, $subscription;
    public $menuCalendarId, $scheduleDate;






    public function mount($id)
    {


        // :: getCustomer - subscription
        $this->customer = Customer::find($id);
        $this->subscription = $this->customer?->latestSubscription();



        // 1.2: menuCalendar - scheduleDate
        $this->menuCalendarId = $this->subscription?->menuCalendarId ?? null;
        $this->scheduleDate = session('customerScheduleDate') ?? $this->getCurrentDate();



    } // end function











    // -----------------------------------------------------------







    public function changeScheduleDate($scheduleDate)
    {



        // :: scheduleDateSession
        Session::flash('customerScheduleDate', $scheduleDate);

        return $this->redirect(route('dashboard.singleCustomerMenu', [$this->customer->id]), navigate: true);




    } // end function












    // -----------------------------------------------------------










    public function render()
    {


        // 1: dependencies
        $menuCalendars = MenuCalendar::where('isActive', true)->get();
        $mealTypes = MealType::all();







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









        // 3: calendar - scheduleMeals
        $calendarScheduleMeals = MenuCalendarScheduleMeal::where('menuCalendarScheduleId', $subscriptionSchedule->menuCalendarScheduleId)
            ->where('scheduleDate', $this->scheduleDate)
            ->get();









        // :: initTooltips
        $this->dispatch('initTooltips');




        return view('livewire.dashboard.customers.manage.single-customer-menu', compact('menuCalendars', 'mealTypes', 'datesUntilSubscription', 'calendarScheduleMeals', 'subscriptionScheduleMeals'));


    } // end function




} // end class
