<?php

namespace App\Livewire\CustomerPortal\CustomerHome\Components;

use App\Models\MealSize;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;

class CustomerHomeViewMeal extends Component
{




    use HelperTrait;



    // :: variables
    public $mealSize;






    #[On('viewMeal')]
    public function remount($id)
    {



        // 1: get instance
        $this->mealSize = MealSize::find($id);



    } // end function













    // -----------------------------------------------------------






    public function render()
    {




        // :: initTooltips
        $this->dispatch('initTooltips');




        return view('livewire.customer-portal.customer-home.components.customer-home-view-meal');


    } // end function





} // end class
