<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;


class Inventory extends Component
{
    public function render()
    {


        $this->dispatch('initSelect');

        return view('livewire.dashboard.inventory');

    } // end function

} // end class
