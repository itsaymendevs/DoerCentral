<?php

namespace App\Livewire\Dashboard\ManageKitchen\KitchenToday;

use App\Models\CustomerSubscriptionDelivery;
use App\Models\CustomerSubscriptionSchedule;
use App\Models\CustomerSubscriptionScheduleMeal;
use App\Models\Ingredient;
use App\Models\IngredientCategory;
use App\Traits\HelperTrait;
use Livewire\Component;

class KitchenTodayPreparations extends Component
{


    use HelperTrait;




    // :: variables
    public $searchScheduleDate, $searchScheduleUntilDate, $ingredientsWithGrams, $searchCategory, $searchIngredient;
    public $toKG = false, $unit = 1;









    public function mount()
    {



        // 1: defaultDate
        $this->searchScheduleDate = $this->getCurrentDate();



        // 1.2: callDependencies
        $this->dependencies();





    } // end function










    // -----------------------------------------------------------










    public function dependencies()
    {




        // :: checkScheduleUntilDate
        $this->searchScheduleUntilDate == '' ? $this->searchScheduleUntilDate = null : null;






        // 1: getDeliveries
        $customers = CustomerSubscriptionDelivery::where('deliveryDate', '>=', $this->searchScheduleDate)
            ->where('deliveryDate', '<=', $this->searchScheduleUntilDate ?? $this->searchScheduleDate)
                ?->pluck('customerId')?->toArray() ?? [];






        // 1.2: getSchedules - meals
        $schedules = CustomerSubscriptionSchedule::where('scheduleDate', '>=', $this->searchScheduleDate)
            ->where('scheduleDate', '<=', $this->searchScheduleUntilDate ?? $this->searchScheduleDate)
            ->whereIn('customerId', $customers)
            ->whereIn('status', ['Pending', 'Completed'])?->pluck('id')->toArray() ?? [];




        $scheduleMeals = CustomerSubscriptionScheduleMeal::whereNotNull('mealId')
            ->whereIn('subscriptionScheduleId', $schedules)
            ->orderBy('mealTypeId')->get();







        // --------------------------------------------
        // --------------------------------------------







        // 3: ingredientsWithGrams
        $this->ingredientsWithGrams = [];




        // 3.1: loop - groupByMeal
        foreach ($scheduleMeals->groupBy('mealId') as $commonMeal => $scheduleMealsByMeal) {



            // 3.2: loop - mealSize
            foreach ($scheduleMealsByMeal->groupBy('sizeId') as $commonSize => $scheduleMealsBySize) {





                // 3.3: loop - scheduleMeals
                foreach ($scheduleMealsByMeal as $scheduleMeal) {



                    // 3.3.1: getMealSize
                    $mealSize = $scheduleMeal->mealSize();





                    // ---------------------------------
                    // ---------------------------------





                    // 3.3.2: getIngredientsWithGrams
                    $mealSizeIngredientsWithGrams = $mealSize->ingredientsWithGrams();



                    // 3.3.3: multiplyByMeals
                    $mealSizeIngredientsWithGramsMultiplied = array_map(function ($element) use ($scheduleMealsByMeal) {

                        return $element * ($scheduleMealsByMeal->count() ?? 0);

                    }, $mealSizeIngredientsWithGrams);






                    // ---------------------------------
                    // ---------------------------------






                    // 3.3.4: merge
                    $this->ingredientsWithGrams = $this->ingredientsWithGrams + $mealSizeIngredientsWithGramsMultiplied;






                } // end loop - scheduleMeals






            } // end loop - groupBySize



        } // end loop - groupByMeal







    } // end function









    // -----------------------------------------------------------









    public function export()
    {






    } // end function








    // -----------------------------------------------------------









    public function render()
    {





        // 1: dependencies
        $categories = IngredientCategory::all();
        $this->unit = $this->toKG ? $this->getGramToKG() : 1;






        // 1.2: get ingredients
        $ingredients = Ingredient::orderBy('categoryId')
            ->whereIn('id', array_keys($this->ingredientsWithGrams))
            ->where('name', 'LIKE', '%' . $this->searchIngredient . '%')
            ->whereIn('categoryId', $this->searchCategory ? [$this->searchCategory] : $categories->pluck('id')->toArray())->get();







        return view('livewire.dashboard.manage-kitchen.kitchen-today.kitchen-today-preparations', compact('categories', 'ingredients'));




    } // end function



} // end class
