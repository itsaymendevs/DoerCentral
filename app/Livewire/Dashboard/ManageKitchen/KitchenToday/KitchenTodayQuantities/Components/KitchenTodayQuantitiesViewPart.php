<?php

namespace App\Livewire\Dashboard\ManageKitchen\KitchenToday\KitchenTodayQuantities\Components;

use App\Models\Meal;
use Livewire\Attributes\On;
use Livewire\Component;

class KitchenTodayQuantitiesViewPart extends Component
{


    // :: variables
    public $meal, $mealSize, $partAmount, $mealSizeTotalAmount;
    public $unit = 1;









    #[On('viewPart')]
    public function remount($id, $partAmount, $unit)
    {



        // 1: getParams
        $meal = Meal::find($id);
        $this->unit = $unit;





        // 1.2: getMealSize [ALWAYS ITEM SIZE]
        $this->mealSize = $meal?->sizes->first();








        // ---------------------------------------
        // ---------------------------------------







        // 1.3: totalAmount - partAmount
        $this->partAmount = $partAmount ?? 0;
        $this->mealSizeTotalAmount = $this->mealSize->totalGrams() ?? 1;








    } // end function












    // -----------------------------------------------------------










    public function render()
    {




        // 1: dependencies
        $instructions = $this->mealSize?->meal?->instructions ?? [];






        return view('livewire.dashboard.manage-kitchen.kitchen-today.kitchen-today-quantities.components.kitchen-today-quantities-view-part', compact('instructions'));


    } // end function


} // end class
