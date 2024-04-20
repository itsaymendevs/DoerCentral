<?php

namespace App\Livewire\Dashboard\ManageKitchen\KitchenToday\KitchenTodayProduction;

use App\Models\Meal;
use App\Models\MealSize;
use Livewire\Attributes\On;
use Livewire\Component;

class KitchenTodayProductionViewPart extends Component
{


    // :: variables
    public $mealSize;






    #[On('viewPart')]
    public function remount($id)
    {


        // 1: get meal
        $meal = Meal::find($id);


        // 1.2: getMealSize
        $this->mealSize = $meal?->sizes?->first();



    } // end function












    // -----------------------------------------------------------










    public function render()
    {

        return view('livewire.dashboard.manage-kitchen.kitchen-today.kitchen-today-production.kitchen-today-production-view-part');


    } // end function


} // end class
