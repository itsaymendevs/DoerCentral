<?php

namespace App\Livewire\Subscription\Customer;

use App\Livewire\Forms\CustomerSubscriptionForm;
use App\Models\Plan;
use Livewire\Attributes\Layout;
use Livewire\Component;


#[Layout('livewire.layouts.subscription.customer')]
class CustomerSubscriptionStepTwo extends Component
{



    // :: variables
    public CustomerSubscriptionForm $instance;
    public $plan;






    public function mount($id)
    {

        // 1: get instance
        $this->plan = Plan::find($id);



        // :: checkSession
        session('customer') ?? $this->redirect(route('subscriptions.customerStepOne'), navigate: true);



    } // end function








    // --------------------------------------------------------------







    public function render()
    {



        // :: initTooltips
        $this->dispatch('initTooltips');



        return view('livewire.subscription.customer.customer-subscription-step-two');


    } // end function





} // end class

