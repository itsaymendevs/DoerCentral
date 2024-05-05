<?php

namespace App\Livewire\Layouts;

use Livewire\Attributes\Lazy;
use Livewire\Component;


#[Lazy]
class Dashboard extends Component
{


    public function render()
    {
        return view('livewire.layouts.dashboard');

    } // end function



} // end class
