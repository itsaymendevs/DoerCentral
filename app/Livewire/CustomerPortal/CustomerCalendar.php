<?php

namespace App\Livewire\CustomerPortal;

use App\Models\Customer;
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
    public $searchFromDate = '';









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




        // 1.2: fromDate - weekDates
        $this->searchFromDate == '' ? $this->searchFromDate = $this->getCurrentDate() : null;
        $weekDates = $this->getWeekDates($this->searchFromDate);






        // 1.2: get schedules - mealTypes
        $mealTypes = MealType::whereIn('id', $this->subscription?->typesInArray())->get();


        $schedules = CustomerSubscriptionSchedule::where('customerSubscriptionId', $this->subscription->id)
            ->where('scheduleDate', '>=', $this->searchFromDate)
            ->where('scheduleDate', '<=', end($weekDates))
            ->orderBy('scheduleDate')
            ->get();













        // :: initTooltips
        $this->dispatch('initTooltips');




        return view('livewire.customer-portal.customer-calendar', compact('weeks', 'schedules', 'weekDates', 'mealTypes'));



    } // end function




} // end class
