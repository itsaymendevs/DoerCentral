<?php

namespace App\Livewire\Dashboard\Delivery\Components;

use App\Models\CityHoliday;
use App\Models\Holiday;
use Livewire\Attributes\On;
use Livewire\Component;

class DeliveryManageHolidays extends Component
{




    // :: variables
    public $cityId;




    public function mount($cityId)
    {

        // :: params
        $this->cityId = $cityId;


    } // end function






    // ------------------------------------------------------------------





    #[On('refreshViews')]
    public function render()
    {



        // 1: dependencies
        $holidays = CityHoliday::where('cityId', $this->cityId)->get();




        // :: initTooltips
        $this->dispatch('initTooltips');


        return view('livewire.dashboard.delivery.components.delivery-manage-holidays', compact('holidays'));


    } // end function




} // end class

