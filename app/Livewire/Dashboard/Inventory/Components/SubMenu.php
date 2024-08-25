<?php

namespace App\Livewire\Dashboard\Inventory\Components;

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

        return view('livewire.dashboard.inventory.components.submenu');

    } // end function



} // end class
