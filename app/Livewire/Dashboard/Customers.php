<?php

namespace App\Livewire\Dashboard;

use App\Models\Customer;
use App\Models\Plan;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;

class Customers extends Component
{


    use HelperTrait;


    // :: variable
    public $searchCustomer = '';
    public $searchPlan, $searchStatus;








    #[On('refreshViews')]
    public function render()
    {


        // 1: dependencies
        $plans = Plan::all();




        // 1.2: customers - makeFilter
        $customersRaw = Customer::where('name', 'LIKE', '%' . $this->searchCustomer . '%')->get();

        $customers = $customersRaw->filter(function ($item) {

            // :: applyFilters
            $toReturn = true;


            // 1: plan
            $this->searchPlan ? $item->latestPlan()->id != $this->searchPlan ? $toReturn = false : null : null;


            return $toReturn;

        });









        // :: initTooltips
        $this->dispatch('initTooltips');



        return view('livewire.dashboard.customers', compact('plans', 'customers'));



    } // end function








} // end class





