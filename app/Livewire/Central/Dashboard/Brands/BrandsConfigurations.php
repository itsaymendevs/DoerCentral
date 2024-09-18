<?php

namespace App\Livewire\Central\Dashboard\Brands;

use App\Models\ClientLead;
use App\Models\Profile;
use Livewire\Component;

class BrandsConfigurations extends Component
{


    // :: variables
    public $brand;



    public function mount($id)
    {


        // 1: get instance
        $this->brand = ClientLead::find($id);


    } // end function





    // -----------------------------------------------------------





    public function render()
    {


        // 1: profile
        return view('livewire.central.dashboard.brands.brands-configurations');

    } // end function

} // end class
