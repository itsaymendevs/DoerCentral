<?php

namespace App\Livewire\Website\Plans\PlansCustomization\Components;

use Livewire\Component;

class PlansCustomizationProgress extends Component
{


    public $progressValue;




    public function mount($value)
    {

        $this->progressValue = $value;


    } // end function










    // ----------------------------------------------------------------












    public function render()
    {

        return view('livewire.website.plans.plans-customization.components.plans-customization-progress');


    } // end function







} // end class
