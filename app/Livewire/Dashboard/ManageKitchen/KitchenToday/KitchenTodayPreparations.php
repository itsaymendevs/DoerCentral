<?php

namespace App\Livewire\Dashboard\ManageKitchen\KitchenToday;

use App\Exports\KitchenPreparationExport;
use App\Models\CustomerSubscriptionDelivery;
use App\Models\CustomerSubscriptionSchedule;
use App\Models\CustomerSubscriptionScheduleMeal;
use App\Models\Ingredient;
use App\Models\IngredientCategory;
use App\Traits\HelperTrait;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;

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
        $deliveries = CustomerSubscriptionDelivery::where('deliveryDate', '>=', $this->searchScheduleDate)
            ->where('deliveryDate', '<=', $this->searchScheduleUntilDate ?? $this->searchScheduleDate)
                ?->pluck('id')?->toArray() ?? [];






        // 1.2: getSchedules - meals
        $schedules = CustomerSubscriptionSchedule::where('scheduleDate', '>=', $this->searchScheduleDate)
            ->where('scheduleDate', '<=', $this->searchScheduleUntilDate ?? $this->searchScheduleDate)
            ->whereIn('customerSubscriptionDeliveryId', $deliveries)
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
            foreach ($scheduleMealsByMeal?->whereNotNull('sizeId')?->groupBy('sizeId') as $commonSize => $scheduleMealsBySize) {





                // 3.3: loop - scheduleMeals
                foreach ($scheduleMealsBySize ?? [] as $scheduleMeal) {




                    // 3.3.1: getMealSize - customerExcludes
                    $mealSize = $scheduleMeal->mealSize();






                    // ---------------------------------
                    // ---------------------------------







                    // 3.3.2: getIngredientsWithGrams
                    $mealSizeIngredientsWithGrams = $mealSize?->ingredientsWithGrams() ?? [];





                    // 3.3.3: get customerExcludes
                    $combined = $scheduleMeal->customer->checkMealCompatibility($commonMeal);
                    $excludeIngredients = $combined?->excludeIngredients?->pluck('id')?->toArray() ?? [];







                    // ---------------------------------
                    // ---------------------------------







                    // 3.3.4: merge
                    $sumArray = [];

                    foreach (array_keys($this->ingredientsWithGrams + ($mealSizeIngredientsWithGrams ?? [])) as $key) {


                        if (! in_array($key, $excludeIngredients)) {

                            $sumArray[$key] = (isset($this->ingredientsWithGrams[$key]) ? $this->ingredientsWithGrams[$key] : 0) + (isset($mealSizeIngredientsWithGrams[$key]) ? $mealSizeIngredientsWithGrams[$key] : 0);

                        } // end if


                    } // end loop



                    $this->ingredientsWithGrams = $sumArray;







                } // end loop - scheduleMeals




            } // end loop - groupBySize



        } // end loop - groupByMeal







    } // end function









    // -----------------------------------------------------------









    public function export()
    {



        // 1: prepareExportData


        // 1.2: dependencies
        $categories = IngredientCategory::all();






        // 1.3: get ingredients
        $ingredients = Ingredient::orderBy('categoryId')
            ->whereIn('id', array_keys($this->ingredientsWithGrams))
            ->where('name', 'LIKE', '%' . $this->searchIngredient . '%')
            ->whereIn('categoryId', $this->searchCategory ? [$this->searchCategory] : $categories->pluck('id')->toArray())->get();









        // ---------------------------------------
        // ---------------------------------------









        // 2: makeExport
        if ($ingredients?->count() > 0) {


            return Excel::download(new KitchenPreparationExport($ingredients, $this->ingredientsWithGrams, $this->unit), 'kitchen-preparations.xlsx');



            // :: no-production
        } else {



            $this->makeAlert('info', 'Preparations-list is empty');


        } // end if







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
