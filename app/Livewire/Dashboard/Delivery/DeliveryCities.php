<?php

namespace App\Livewire\Dashboard\Delivery;

use App\Models\City;
use Livewire\Component;

class DeliveryCities extends Component
{


    public function render()
    {

        // 1: dependencies
        $cities = City::all();


        return view('livewire.dashboard.delivery.delivery-cities', compact('cities'));


    } // end function



} // end class
