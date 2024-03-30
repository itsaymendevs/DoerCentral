<?php

namespace App\Livewire\Dashboard\ManageKitchen\KitchenLabels;

use App\Models\Container;
use Livewire\Component;

class KitchenLabelsCreate extends Component
{
    public function render()
    {



        // 1: dependencies
        $containers = Container::all();




        return view('livewire.dashboard.manage-kitchen.kitchen-labels.kitchen-labels-create', compact('containers'));


    } // end function


} // end class
