<?php

namespace App\Livewire\Dashboard\ManageKitchen\KitchenToday\KitchenTodayProduction;

use App\Models\Meal;
use App\Models\MealSize;
use Livewire\Attributes\On;
use Livewire\Component;

class KitchenTodayProductionViewPart extends Component
{


    // :: variables
    public $mealSize, $mealSizeTotalAmount, $partAmount;
    public $unit = 1;









    #[On('viewPart')]
    public function remount($id, $partAmount, $unit)
    {


        // 1: get meal
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






        return view('livewire.dashboard.manage-kitchen.kitchen-today.kitchen-today-production.kitchen-today-production-view-part', compact('instructions'));


    } // end function


} // end class
