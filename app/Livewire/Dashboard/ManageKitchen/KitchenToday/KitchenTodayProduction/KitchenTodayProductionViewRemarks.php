<?php

namespace App\Livewire\Dashboard\ManageKitchen\KitchenToday\KitchenTodayProduction;

use App\Models\CustomerSubscriptionScheduleMeal;
use Livewire\Attributes\On;
use Livewire\Component;

class KitchenTodayProductionViewRemarks extends Component
{





    // :: variables
    public $scheduleMeals;









    #[On('viewRemarks')]
    public function remount($scheduleMealsByMeal)
    {



        // 1: get scheduleMeals
        $this->scheduleMeals = CustomerSubscriptionScheduleMeal::whereNotNull('remarks')
                ?->whereIn('id', collect($scheduleMealsByMeal)?->pluck('id')?->toArray() ?? [])->get();






    } // end function












    // -----------------------------------------------------------










    public function render()
    {

        return view('livewire.dashboard.manage-kitchen.kitchen-today.kitchen-today-production.kitchen-today-production-view-remarks');


    } // end function


} // end class
