<?php

namespace App\Livewire\Central\Dashboard\Brands\BrandsDetails\Components;

use App\Models\ClientLead;
use Livewire\Component;

class Submenu extends Component
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

        return view('livewire.central.dashboard.brands.brands-details.components.submenu');

    } // end function

} // end class
