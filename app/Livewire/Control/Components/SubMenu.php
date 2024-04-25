<?php

namespace App\Livewire\Control\Components;

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

        return view('livewire.control.components.sub-menu');

    } // end function



} // end class
