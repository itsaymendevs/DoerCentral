<?php

namespace App\Livewire\Dashboard\Delivery\DeliveryCities\Components;

use Livewire\Component;
use App\Models\CityHoliday;
use Livewire\Attributes\On;


class DeliveryCitiesHolidays extends Component
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


        return view('livewire.dashboard.delivery.delivery-cities.components.delivery-cities-holidays', compact('holidays'));


    } // end function




} // end class
