<?php

namespace App\Livewire\Dashboard\Delivery\Components;

use App\Models\Holiday;
use Livewire\Attributes\On;
use Livewire\Component;

class DeliveryManageHolidays extends Component
{




    #[On('refreshViews')]
    public function render()
    {



        // 1: dependencies
        $holidays = Holiday::all();




        // :: initTooltips
        $this->dispatch('initTooltips');


        return view('livewire.dashboard.delivery.components.delivery-manage-holidays', compact('holidays'));


    } // end function




} // end class

