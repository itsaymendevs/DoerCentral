<?php

namespace App\Livewire\Dashboard\Delivery\Components;

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

        return view('livewire.dashboard.delivery.components.sub-menu');

    } // end function



} // end class
