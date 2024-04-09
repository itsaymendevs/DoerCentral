<?php

namespace App\Livewire\Dashboard\Customers\Manage;

use App\Models\Customer;
use App\Models\CustomerSubscriptionSchedule;
use App\Models\MealType;
use App\Traits\CalendarTrait;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;

class SingleCustomerCalendar extends Component
{


    use HelperTrait;
    use CalendarTrait;



    // :: variables
    public $customer, $subscription;
    public $searchFromDate = '';









    public function mount($id)
    {


        // :: getCustomer - subscription
        $this->customer = Customer::find($id);
        $this->subscription = $this->customer?->latestSubscription();






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
        $this->searchFromDate == '' ? $this->searchFromDate = current($weeks) : null;
        $weekDates = $this->getWeekDates($this->searchFromDate);






        // 1.2: get schedules - mealTypes
        $mealTypes = MealType::whereIn('id', $this->subscription?->typesInArray())->get();


        $schedules = CustomerSubscriptionSchedule::where('scheduleDate', '>=', $this->searchFromDate)
            ->where('scheduleDate', '<=', end($weekDates))
            ->orderBy('scheduleDate')
            ->get();










        // :: initTooltips
        $this->dispatch('initTooltips');




        return view('livewire.dashboard.customers.manage.single-customer-calendar', compact('weeks', 'schedules', 'weekDates', 'mealTypes'));



    } // end function




} // end class
