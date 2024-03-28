<?php

namespace App\Livewire\Dashboard;

use App\Models\Customer;
use App\Models\CustomerSubscription;
use App\Models\Plan;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class CustomersStateOfAccount extends Component
{



    use HelperTrait;
    use WithPagination;




    // :: variable
    public $searchPlan, $searchFromDate, $searchUntilDate;










    #[On('refreshViews')]
    public function render()
    {


        // 1: dependencies
        $plans = Plan::all();




        // 1.2: subscriptions
        if ($this->searchPlan)
            $subscriptions = CustomerSubscription::orderBy('startDate')
                ->where('planId', $this->searchPlan)
                ->where('startDate', '>=', $this->searchFromDate ?? date('Y-m-d'))
                ->where('untilDate', '<=', $this->searchUntilDate ?? '3000-01-01')
                ->paginate(20);
        else
            $subscriptions = CustomerSubscription::orderBy('startDate')
                ->where('startDate', '>=', $this->searchFromDate ?? date('Y-m-d'))
                ->where('untilDate', '<=', $this->searchUntilDate ?? '3000-01-01')
                ->paginate(20);






        // :: initTooltips
        $this->dispatch('initTooltips');



        return view('livewire.dashboard.customers-state-of-account', compact('plans', 'subscriptions'));





    } // end function








} // end class
