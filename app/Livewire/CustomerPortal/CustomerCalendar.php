<?php

namespace App\Livewire\CustomerPortal;

use App\Models\Customer;
use App\Models\CustomerSubscriptionDelivery;
use App\Models\CustomerSubscriptionSchedule;
use App\Models\MealType;
use App\Traits\CalendarTrait;
use App\Traits\HelperTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('livewire.layouts.portals.customer.dashboard')]
class CustomerCalendar extends Component
{



    use HelperTrait;
    use CalendarTrait;



    // :: variables
    public $customer, $subscription;
    public $searchFromDate = '', $searchScheduleDate = '';









    public function mount()
    {


        // :: getCustomer - subscription
        $this->customer = Customer::find(session('customerId'));
        $this->subscription = $this->customer?->currentSubscription();






    } // end function
















    // -----------------------------------------------------------








    public function changeWeek($direction)
    {


        // :: getWeeks
        $weeks = $this->getWeeksOptions();



        // :: loop - weeks
        foreach ($weeks as $key => $week) {


            // 1: previousWeek
            $this->searchFromDate == $week && $direction == 'previous' && ! empty($weeks[$key - 1]) ?
                $this->searchFromDate = $weeks[$key - 1] : null;


            // 2: nextWeek
            $this->searchFromDate == $week && $direction == 'next' && ! empty($weeks[$key + 1]) ?
                $this->searchFromDate = $weeks[$key + 1] : null;


        } // end loop





    } // end function








    // -----------------------------------------------------------











    #[On('refreshViews')]
    public function render()
    {




        // 1: dependencies
        $weeks = $this->getWeeksOptions();




        // 1.2: fromDate [scheduleDate For-Mobile] - weekDates
        $this->searchFromDate == '' ? $this->searchFromDate = $this->getCurrentDate() : null;
        $this->searchScheduleDate == '' ? $this->searchScheduleDate = $this->getCurrentDate() : null;

        $weekDates = $this->getWeekDates($this->searchFromDate);






        // --------------------------------------------
        // --------------------------------------------






        // 1.2: getDeliveries - mealTypes
        $mealTypes = MealType::whereIn('id', $this->subscription?->typesInArray())->get();


        $deliveries = CustomerSubscriptionDelivery::orderBy('deliveryDate')
                ?->where('customerSubscriptionId', $this->subscription->id)
                ?->where('deliveryDate', '>=', $this->searchFromDate)
                ?->where('deliveryDate', '<=', end($weekDates))
                ?->whereIn('status', ['Pending', 'Picked', 'Completed'])
                ?->pluck('id')?->toArray() ?? [];






        // 2.1: getSchedules
        $schedules = CustomerSubscriptionSchedule::whereIn('customerSubscriptionDeliveryId', $deliveries ?? [])
            ->orderBy('scheduleDate')
            ->get();







        // -------------------------------------------
        // -------------------------------------------





        // 3: mobileSchedules
        $deliveries = CustomerSubscriptionDelivery::orderBy('deliveryDate')
                ?->where('customerSubscriptionId', $this->subscription->id)
                ?->where('deliveryDate', $this->searchScheduleDate)
                ?->whereIn('status', ['Pending', 'Picked', 'Completed'])
                ?->pluck('id')?->toArray() ?? [];




        // :: extra - forMobile
        $schedulesForMobile = CustomerSubscriptionSchedule::whereIn('customerSubscriptionDeliveryId', $deliveries ?? [])
            ->where('scheduleDate', $this->searchScheduleDate)
            ->get();









        // :: initTooltips
        $this->dispatch('initTooltips');




        return view('livewire.customer-portal.customer-calendar', compact('weeks', 'schedules', 'schedulesForMobile', 'weekDates', 'mealTypes'));



    } // end function




} // end class
