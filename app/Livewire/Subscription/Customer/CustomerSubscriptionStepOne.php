<?php

namespace App\Livewire\Subscription\Customer;

use App\Models\Plan;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Component;



#[Layout('livewire.layouts.subscription.customer')]
class CustomerSubscriptionStepOne extends Component
{





    public function mount()
    {


        // :: forgetSession
        Session::forget('customer');


    } // end function




    // --------------------------------------------------------------





    public function determine($id)
    {

        $this->dispatch('determineCustomer', $id);

    } // end function







    // --------------------------------------------------------------







    public function render()
    {

        // 1: dependencies
        $plans = Plan::whereHas('ranges')->get();



        // :: initTooltips
        $this->dispatch('initTooltips');



        return view('livewire.subscription.customer.customer-subscription-step-one', compact('plans'));


    } // end function





} // end class
