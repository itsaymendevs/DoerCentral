<?php

namespace App\Livewire\CustomerPortal;

use Livewire\Attributes\Layout;
use Livewire\Component;



#[Layout('livewire.layouts.portals.customer.dashboard')]
class CustomerGeneral extends Component
{




    public function render()
    {

        return view('livewire.customer-portal.customer-general');


    } // end function


} // end class
