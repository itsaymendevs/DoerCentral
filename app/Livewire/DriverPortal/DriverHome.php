<?php

namespace App\Livewire\DriverPortal;

use Livewire\Attributes\Layout;
use Livewire\Component;


#[Layout('livewire.layouts.portals.driver.dashboard')]
class DriverHome extends Component
{
    public function render()
    {
        return view('livewire.driver-portal.driver-home');
    }
}
