<?php

namespace App\Livewire\Dashboard\ManageKitchen\KitchenToday\KitchenTodayProduction;

use App\Models\CustomerSubscriptionScheduleMeal;
use App\Models\MealSize;
use Livewire\Attributes\On;
use Livewire\Component;

class KitchenTodayProductionViewExcludes extends Component
{




    // :: variables
    public $mealSizes, $scheduleMeals, $customerExcludes, $ingredientsBySize, $partsBySize;
    public $unit = 1;








    #[On('viewExcludes')]
    public function remount($scheduleMealsByMeal, $unit)
    {




        // 1: reset - dependencies
        $this->reset();

        $this->unit = $unit;
        $this->scheduleMeals = CustomerSubscriptionScheduleMeal::whereIn('id', collect($scheduleMealsByMeal)?->pluck('id')?->toArray() ?? [])->get();







        // ----------------------------------------
        // ----------------------------------------






        // 2: get customerExcludes
        $this->customerExcludes = $this->scheduleMeals?->first()?->mealCustomerExcludes($this->scheduleMeals);





        // 2.1: updateScheduleMeals
        $this->scheduleMeals = CustomerSubscriptionScheduleMeal::whereIn('customerId', array_keys($this->customerExcludes ?? []))?->whereIn('id', collect($scheduleMealsByMeal)?->pluck('id')?->toArray() ?? [])?->get();






        // 3: mealSizes
        $this->mealSizes = MealSize::whereIn('mealId', $this->scheduleMeals?->pluck('mealId')?->toArray() ?? [])
                ?->whereIn('sizeId', $this->scheduleMeals?->pluck('sizeId')?->toArray() ?? [])
                ?->get();







        // 3: prepGrams
        $this->prepTotalGrams();





    } // end function








    // -----------------------------------------------------------









    public function prepTotalGrams()
    {



        // 1: loop - scheduleMeals [eachRepresentCustomer]
        foreach ($this->scheduleMeals ?? [] as $key => $scheduleMeal) {




            // 1.2: getExcludes
            $singleCustomerExcludes = $this->customerExcludes[$scheduleMeal->customerId];





            // 1.3: loop - ingredients
            foreach ($scheduleMeal?->mealSize()?->ingredients?->where('isDefault', 1)?->whereIn('ingredientId', $singleCustomerExcludes ?? []) ?? [] as $mealSizeIngredient) {



                $this->ingredientsBySize[$scheduleMeal?->mealSize()?->sizeId][$mealSizeIngredient->ingredientId]['size'] = $scheduleMeal?->mealSize()?->size?->name;


                $this->ingredientsBySize[$scheduleMeal?->mealSize()?->sizeId][$mealSizeIngredient->ingredientId]['ingredient'] = $mealSizeIngredient?->ingredient?->name;


                $this->ingredientsBySize[$scheduleMeal?->mealSize()?->sizeId][$mealSizeIngredient->ingredientId]['customers'] = ($this->ingredientsBySize[$scheduleMeal?->mealSize()?->sizeId][$mealSizeIngredient->ingredientId]['customers'] ?? '') . $scheduleMeal?->customer?->fullName() . '<br />';



                $this->ingredientsBySize[$scheduleMeal?->mealSize()?->sizeId][$mealSizeIngredient->ingredientId]['amount'] = ($this->ingredientsBySize[$scheduleMeal?->mealSize()?->sizeId][$mealSizeIngredient->ingredientId]['amount'] ?? 0) + ($mealSizeIngredient?->amount ?? 0);



            } // end loop - ingredients









            // --------------------------------------------------------
            // --------------------------------------------------------








            // 1.4: loop - parts
            foreach ($scheduleMeal?->mealSize()?->parts?->where('isDefault', 1) ?? [] as $mealSizePart) {



                // 1.4.5: loop - partIngredients - LayerOne
                foreach ($mealSizePart->part->ingredients?->where('isDefault', 1)?->whereIn('ingredientId', $singleCustomerExcludes ?? []) ?? [] as $partIngredient) {



                    // 1.4.6: getAmount of ingredient
                    $mealSizeTotalAmount = $mealSizePart->part?->sizes?->first()?->totalGrams() ?? 1;
                    $amount = (($partIngredient?->amount ?? 0) / $mealSizeTotalAmount) * $mealSizePart->amount;






                    $this->partsBySize[$scheduleMeal?->mealSize()?->sizeId][$partIngredient->ingredientId]['size'] = $scheduleMeal?->mealSize()?->size?->name;


                    $this->partsBySize[$scheduleMeal?->mealSize()?->sizeId][$partIngredient->ingredientId]['ingredient'] = $partIngredient?->ingredient?->name;


                    $this->partsBySize[$scheduleMeal?->mealSize()?->sizeId][$partIngredient->ingredientId]['customers'] = ($this->partsBySize[$scheduleMeal?->mealSize()?->sizeId][$partIngredient->ingredientId]['customers'] ?? '') . $scheduleMeal?->customer?->fullName() . '<br />';



                    $this->partsBySize[$scheduleMeal?->mealSize()?->sizeId][$partIngredient->ingredientId]['amount'] = ($this->partsBySize[$scheduleMeal?->mealSize()?->sizeId][$partIngredient->ingredientId]['amount'] ?? 0) + $amount;





                } // end ingredients


            } // end loop - parts






        } // end loop - scheduleMeals









    } // end function










    // -----------------------------------------------------------










    public function render()
    {





        // :: initTooltips
        $this->dispatch('initTooltips');




        return view('livewire.dashboard.manage-kitchen.kitchen-today.kitchen-today-production.kitchen-today-production-view-excludes');


    } // end function


} // end class
