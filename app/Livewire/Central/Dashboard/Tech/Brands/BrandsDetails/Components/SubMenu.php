<?php

namespace App\Livewire\Central\Dashboard\Tech\Brands\BrandsDetails\Components;

use App\Models\ClientLead;
use Livewire\Component;

class SubMenu extends Component
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

        return view('livewire.central.dashboard.tech.brands.brands-details.components.sub-menu');

    } // end function



} // end class
