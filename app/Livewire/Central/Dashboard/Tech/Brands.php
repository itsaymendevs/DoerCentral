<?php

namespace App\Livewire\Central\Dashboard\Tech;

use App\Models\ClientLead;
use Livewire\Component;

class Brands extends Component
{


    // :: variables
    public $searchBrand = '';





    public function render()
    {

        // 1: dependencies
        $brands = ClientLead::where('name', 'LIKE', "%{$this->searchBrand}%")
            ->where('status', 'processing')
            ->get();





        return view('livewire.central.dashboard.tech.brands', compact('brands'));


    } // end function




} // end class
