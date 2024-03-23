<?php

namespace App\Livewire\Dashboard\Customers\Manage\Components;

use Livewire\Component;

class SubMenu extends Component
{


    // :: variables
    public $id;





    public function mount($id)
    {

        // :: params
        $this->id = $id;


    } // end function









    // -----------------------------------------------------------








    public function render()
    {

        return view('livewire.dashboard.customers.manage.components.sub-menu');

    } // end function




} // end class
