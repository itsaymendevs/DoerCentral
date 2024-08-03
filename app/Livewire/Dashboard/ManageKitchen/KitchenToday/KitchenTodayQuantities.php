<?php

namespace App\Livewire\Dashboard\ManageKitchen\KitchenToday;

use App\Exports\KitchenQuantityExport;
use App\Models\CustomerSubscriptionDelivery;
use App\Models\CustomerSubscriptionSchedule;
use App\Models\CustomerSubscriptionScheduleMeal;
use App\Models\Ingredient;
use App\Models\Meal;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Type;
use App\Traits\HelperTrait;
use Livewire\Component;

class KitchenTodayQuantities extends Component
{


    use HelperTrait;




    // :: variables
    public $searchScheduleDate, $partsWithGrams, $ingredientsWithGrams, $searchType, $searchMeal;
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





        // 1: getDeliveries
        $deliveries = CustomerSubscriptionDelivery::where('deliveryDate', $this->searchScheduleDate)?->pluck('id')?->toArray() ?? [];





        // 1.2: getSchedules - meals
        $schedules = CustomerSubscriptionSchedule::where('scheduleDate', $this->searchScheduleDate)
            ->whereIn('customerSubscriptionDeliveryId', $deliveries)
            ->whereIn('status', ['Pending', 'Completed'])?->pluck('id')->toArray() ?? [];




        $scheduleMeals = CustomerSubscriptionScheduleMeal::whereNotNull('mealId')
            ->whereIn('subscriptionScheduleId', $schedules)
            ->orderBy('mealTypeId')->get();







        // --------------------------------------------
        // --------------------------------------------







        // 3: partsWithGrams - ingredientsWithGrams
        $this->partsWithGrams = [];
        $this->ingredientsWithGrams = [];


        $i = 0;



        // 3.1: loop - groupByMeal
        foreach ($scheduleMeals->groupBy('mealId') as $commonMeal => $scheduleMealsByMeal) {




            // 3.2: loop - mealSize
            foreach ($scheduleMealsByMeal?->whereNotNull('sizeId')?->groupBy('sizeId') as $commonSize => $scheduleMealsBySize) {




                // 3.3: loop - scheduleMeals
                foreach ($scheduleMealsBySize as $scheduleMeal) {



                    // 3.3.1: getMealSize
                    $mealSize = $scheduleMeal?->mealSize();




                    // ---------------------------------
                    // ---------------------------------





                    // 3.3.2: contentWithGrams
                    $contentWithGrams = $mealSize?->contentWithGrams(1) ?? [];






                    // ---------------------------------
                    // ---------------------------------




                    // 3.4: sumArray
                    $sumArray = [];





                    // 1: parts
                    foreach (array_keys($this->partsWithGrams + ($contentWithGrams?->partsWithGrams ?? [])) as $key) {

                        $sumArray[$key] = (isset($this->partsWithGrams[$key]) ? $this->partsWithGrams[$key] : 0) + (isset($contentWithGrams?->partsWithGrams[$key]) ? $contentWithGrams?->partsWithGrams[$key] : 0);

                    } // end loop


                    $this->partsWithGrams = $sumArray;









                    // 2: ingredients
                    $sumArray = [];

                    foreach (array_keys($this->ingredientsWithGrams + ($contentWithGrams?->ingredientsWithGrams ?? [])) as $key) {

                        $sumArray[$key] = (isset($this->ingredientsWithGrams[$key]) ? $this->ingredientsWithGrams[$key] : 0) + (isset($contentWithGrams?->ingredientsWithGrams[$key]) ? $contentWithGrams?->ingredientsWithGrams[$key] : 0);

                    } // end loop


                    $this->ingredientsWithGrams = $sumArray;







                } // end loop - scheduleMeals





            } // end loop - groupBySize


        } // end loop - groupByMeal








    } // end function








    // -----------------------------------------------------------







    public function viewPart($id, $partAmount = 0)
    {


        // :: dispatchEvent
        $this->dispatch('viewPart', $id, $partAmount, $this->unit ?? 1);


    } // end function







    // -----------------------------------------------------------







    public function export()
    {



        // 1: prepareExportData






        // 1.2: dependencies
        $types = Type::all();
        $this->unit = $this->toKG ? $this->getGramToKG() : 1;






        // 1.3: get ingredients
        $ingredients = Ingredient::orderBy('categoryId')
            ->whereIn('id', array_keys($this->ingredientsWithGrams))
            ->where('name', 'LIKE', '%' . $this->searchMeal . '%')
            ->get();






        // 1.4: get parts
        $parts = Meal::orderBy('typeId')
            ->whereIn('id', array_keys($this->partsWithGrams))
            ->where('name', 'LIKE', '%' . $this->searchMeal . '%')
            ->whereIn('typeId', $this->searchType ? [$this->searchType] : $types->pluck('id')->toArray())->get();










        // ---------------------------------------
        // ---------------------------------------









        // 2: makeExport
        if ($parts?->count() > 0 || $ingredients?->count() > 0) {


            return Excel::download(new KitchenQuantityExport($parts, $ingredients, $this->partsWithGrams, $this->ingredientsWithGrams, $this->unit), 'kitchen-quantity.xlsx');




            // :: no-production
        } else {



            $this->makeAlert('info', 'Quantity-list is empty');


        } // end if








    } // end function








    // -----------------------------------------------------------









    public function render()
    {





        // 1: dependencies
        $types = Type::all();
        $this->unit = $this->toKG ? $this->getGramToKG() : 1;






        // 1.2: get ingredients
        $ingredients = Ingredient::orderBy('categoryId')
            ->whereIn('id', array_keys($this->ingredientsWithGrams))
            ->where('name', 'LIKE', '%' . $this->searchMeal . '%')
            ->get();






        // 1.3: get parts
        $parts = Meal::orderBy('typeId')
            ->whereIn('id', array_keys($this->partsWithGrams))
            ->where('name', 'LIKE', '%' . $this->searchMeal . '%')
            ->whereIn('typeId', $this->searchType ? [$this->searchType] : $types->pluck('id')->toArray())->get();









        return view('livewire.dashboard.manage-kitchen.kitchen-today.kitchen-today-quantities', compact('types', 'parts', 'ingredients'));




    } // end function






} // end class
