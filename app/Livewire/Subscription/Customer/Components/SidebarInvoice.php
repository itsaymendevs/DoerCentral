<?php

namespace App\Livewire\Subscription\Customer\Components;

use App\Livewire\Forms\CustomerSubscriptionForm;
use Livewire\Component;

class SidebarInvoice extends Component
{


    // :: variables
    public CustomerSubscriptionForm $instance;
    public $plan;


    public function mount($plan, $instance)
    {


        // :: params
        $this->plan = $plan;
        $this->instance = $instance;


    } // end function







    // ------------------------------------------------------------------






    public function render()
    {
        return view('livewire.subscription.customer.components.sidebar-invoice');

    } // end function


} // end class
