<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('livewire.layouts.website')]
class Home extends Component
{


    public function render()
    {

        return view('livewire.home');

    } // end function


} // end class
