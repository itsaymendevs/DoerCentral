<?php

namespace App\Livewire\CustomerPortal\CustomerMenu\Components;

use App\Models\MealSize;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;

class CustomerMenuViewMeal extends Component
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




        return view('livewire.customer-portal.customer-menu.components.customer-menu-view-meal');


    } // end function





} // end class
