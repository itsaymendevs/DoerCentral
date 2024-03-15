<?php

namespace App\Livewire\Subscription\Customers\Components;

use Livewire\Attributes\Layout;
use Livewire\Component;


#[Layout('livewire.layouts.customers')]
class CustomersPromptCustomer extends Component
{
    public function render()
    {
        return view('livewire.subscription.customers.components.customers-prompt-customer');

    } // end function

} // end class
