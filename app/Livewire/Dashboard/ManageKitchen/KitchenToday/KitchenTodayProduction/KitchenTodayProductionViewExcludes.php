<?php

namespace App\Livewire\Dashboard\ManageKitchen\KitchenToday\KitchenTodayProduction;

use App\Models\CustomerSubscriptionScheduleMeal;
use Livewire\Attributes\On;
use Livewire\Component;

class KitchenTodayProductionViewExcludes extends Component
{




    // :: variables
    public $scheduleMeals, $customerExcludes;
    public $unit = 1;








    #[On('viewExcludes')]
    public function remount($scheduleMealsByMeal, $unit)
    {



        // 1: get scheduleMeals - unit
        $this->unit = $unit;
        $this->scheduleMeals = CustomerSubscriptionScheduleMeal::whereIn('id', collect($scheduleMealsByMeal)?->pluck('id')?->toArray() ?? [])->get();







        // ----------------------------------------
        // ----------------------------------------






        // 2: get customerExcludes
        $this->customerExcludes = $this->scheduleMeals?->first()?->mealCustomerExcludes($this->scheduleMeals);




        // 2.1: updateScheduleMeals
        $this->scheduleMeals = CustomerSubscriptionScheduleMeal::whereIn('customerId', array_keys($this->customerExcludes ?? []))?->whereIn('id', collect($scheduleMealsByMeal)?->pluck('id')?->toArray() ?? [])?->get();








    } // end function












    // -----------------------------------------------------------










    public function render()
    {

        return view('livewire.dashboard.manage-kitchen.kitchen-today.kitchen-today-production.kitchen-today-production-view-excludes');


    } // end function


} // end class
