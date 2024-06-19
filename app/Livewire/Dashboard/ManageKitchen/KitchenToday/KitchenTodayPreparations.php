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
    public $searchScheduleDate, $searchCategory, $searchIngredient;
    public $toKG = false, $unit = 1;








    public function mount()
    {


        // :: init
        $this->searchScheduleDate = $this->getCurrentDate();



    } // end function










    // -----------------------------------------------------------









    public function export()
    {




        // 1: prepareExportData




        // 1.2: dependencies
        $categories = IngredientCategory::all();







    } // end function








    // -----------------------------------------------------------









    public function render()
    {





        // 1: dependencies
        $categories = IngredientCategory::all();
        $this->unit = $this->toKG ? $this->getGramToKG() : 1;






        // 2: getDeliveries
        $customers = CustomerSubscriptionDelivery::where('deliveryDate', $this->searchScheduleDate)?->pluck('customerId')?->toArray() ?? [];





        // 2.1: getSchedules - meals
        $schedules = CustomerSubscriptionSchedule::where('scheduleDate', $this->searchScheduleDate)
            ->whereIn('customerId', $customers)
            ->whereIn('status', ['Pending', 'Completed'])?->pluck('id')->toArray() ?? [];




        $scheduleMeals = CustomerSubscriptionScheduleMeal::whereNotNull('mealId')
            ->whereIn('subscriptionScheduleId', $schedules)
            ->orderBy('mealTypeId')->get();







        // --------------------------------------------
        // --------------------------------------------







        // 3: ingredientsWithGrams
        $ingredientsWithGrams = [];




        // 3.1: loop - groupByMeal
        foreach ($scheduleMeals->groupBy('mealId') as $commonMeal => $scheduleMealsByMeal) {



            // 3.2: loop - mealSize
            foreach ($scheduleMealsByMeal->groupBy('sizeId') as $commonSize => $scheduleMealsBySize) {





                // 3.3: loop - scheduleMeals
                foreach ($scheduleMealsByMeal as $scheduleMeal) {



                    // 3.3.1: getMealSize
                    $mealSize = $scheduleMeal->mealSize();




                    // 3.3.2: getIngredientsWithGrams - merge
                    $mealSizeIngredientsWithGrams = $mealSize->ingredientsWithGrams();

                    $ingredientsWithGrams = array_merge($ingredientsWithGrams, $mealSizeIngredientsWithGrams);






                } // end loop - scheduleMeals






            } // end loop - groupBySize



        } // end loop - groupByMeal













        // --------------------------------------------
        // --------------------------------------------








        // 4: get ingredients
        $ingredients = Ingredient::orderBy('categoryId')
            ->whereIn('id', array_keys($ingredientsWithGrams ?? []))
            ->where('name', 'LIKE', '%' . $this->searchIngredient . '%')
            ->whereIn('categoryId', $this->searchCategory ? [$this->searchCategory] : $categories->pluck('id')->toArray())->get();










        return view('livewire.dashboard.manage-kitchen.kitchen-today.kitchen-today-preparations', compact('categories', 'ingredients', 'ingredientsWithGrams'));




    } // end function



} // end class
