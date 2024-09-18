<?php

namespace App\Livewire\Central\Dashboard;

use App\Models\ClientLead;
use Livewire\Component;

class Brands extends Component
{
    public function render()
    {

        // 1: brands / clients
        $brands = ClientLead::all();


        return view('livewire.central.dashboard.brands', compact('brands'));


    } // end function




} // end class
