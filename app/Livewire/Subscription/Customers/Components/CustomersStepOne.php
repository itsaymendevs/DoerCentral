<?php

namespace App\Livewire\Subscription\Customers\Components;

use App\Models\Plan;
use Livewire\Component;

class CustomersStepOne extends Component
{
    public function render()
    {


        return view('livewire.subscription.customers.components.customers-step-one', compact('plans'));


    } // end function
} // end class
