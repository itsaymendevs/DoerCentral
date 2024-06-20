<?php

namespace App\Livewire\Dashboard\ManageKitchen\KitchenToday\KitchenTodayQuantities\Components;

use App\Models\Meal;
use Livewire\Attributes\On;
use Livewire\Component;

class KitchenTodayQuantitiesViewMeal extends Component
{


    // :: variables
    public $meal, $mealSize;
    public $unit = 1;









    #[On('viewMeal')]
    public function remount($id, $unit)
    {


        // 1: getParams
        $meal = Meal::find($id);
        $this->unit = $unit;





        // 1.2: getMealSize [anySize]
        $this->mealSize = $meal?->sizes->first();




    } // end function












    // -----------------------------------------------------------










    public function render()
    {




        // 1: dependencies
        $instructions = $this->mealSize?->meal?->instructions ?? [];






        return view('livewire.dashboard.manage-kitchen.kitchen-today.kitchen-today-quantities.components.kitchen-today-quantities-view-meal', compact('instructions'));


    } // end function


} // end class
