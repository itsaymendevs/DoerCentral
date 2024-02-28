<?php

namespace App\Livewire\Dashboard;

use App\Models\City;
use Livewire\Component;

class Delivery extends Component
{


    public function render()
    {

        // 1: dependencies
        $cities = City::all();


        return view('livewire.dashboard.delivery', compact('cities'));

    } // end function


} // end class
