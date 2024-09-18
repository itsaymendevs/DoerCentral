<?php

namespace App\Livewire\Central\Dashboard\Inventory\Components;

use Livewire\Component;

class SubMenu extends Component
{



    // :: variables
    public $title;






    public function mount($title)
    {

        // :: params
        $this->title = $title;



    } // end function






    // ---------------------------------------------------------------






    public function render()
    {

        return view('livewire.central.dashboard.inventory.components.sub-menu');

    } // end function



} // end class
