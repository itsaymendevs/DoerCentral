<?php

namespace App\Livewire\CustomerPortal;

use Livewire\Attributes\Layout;
use Livewire\Component;


#[Layout('livewire.layouts.portals.customer.dashboard')]
class CustomerDeliveries extends Component
{
    public function render()
    {
        return view('livewire.customer-portal.customer-deliveries');
    }
}
