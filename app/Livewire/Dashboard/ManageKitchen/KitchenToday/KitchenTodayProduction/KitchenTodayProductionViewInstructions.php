<?php

namespace App\Livewire\Dashboard\ManageKitchen\KitchenToday\KitchenTodayProduction;

use App\Models\Meal;
use Livewire\Attributes\On;
use Livewire\Component;

class KitchenTodayProductionViewInstructions extends Component
{



    // :: variables
    public $meal;








    #[On('viewInstructions')]
    public function remount($id)
    {

        // 1: get meal
        $this->meal = Meal::find($id);


    } // end function












    // -----------------------------------------------------------









    public function render()
    {




        // 1: dependencies
        $instructions = $this?->meal?->instructions ?? [];






        return view('livewire.dashboard.manage-kitchen.kitchen-today.kitchen-today-production.kitchen-today-production-view-instructions', compact('instructions'));


    } // end function


} // end class
