<?php

namespace App\Livewire\DriverPortal\DriverHome\Components;

use App\Models\CustomerSubscriptionDelivery;
use Livewire\Attributes\On;
use Livewire\Component;

class DriverHomeMap extends Component
{


    // :: variables
    public $delivery;







    #[On('viewDeliveryMap')]
    public function remount($id)
    {


        // 1: get instance
        $this->delivery = CustomerSubscriptionDelivery::find($id);



    } // end function












    // -----------------------------------------------------------



    public function render()
    {



        // :: initTooltips
        $this->dispatch('initTooltips');


        return view('livewire.driver-portal.driver-home.components.driver-home-map');



    } // end function


} // end class
