<?php

namespace App\Livewire\Subscription\Customer;

use App\Models\Plan;
use Livewire\Attributes\Layout;
use Livewire\Component;



#[Layout('livewire.layouts.subscription.customer')]
class CustomerSubscriptionStepOne extends Component
{



    public function determine($id)
    {

        $this->dispatch('determineCustomer', $id);

    } // end function







    // --------------------------------------------------------------







    public function render()
    {

        // 1: dependencies
        $plans = Plan::all();



        // :: initTooltips
        $this->dispatch('initTooltips');



        return view('livewire.subscription.customer.customer-subscription-step-one', compact('plans'));


    } // end function





} // end class
