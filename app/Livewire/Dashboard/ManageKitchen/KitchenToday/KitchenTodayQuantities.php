<?php

namespace App\Livewire\Dashboard\ManageKitchen\KitchenToday;

use App\Models\CustomerSubscriptionDelivery;
use App\Models\CustomerSubscriptionSchedule;
use App\Models\CustomerSubscriptionScheduleMeal;
use App\Models\Ingredient;
use App\Models\Meal;
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
        $customers = CustomerSubscriptionDelivery::where('deliveryDate', $this->searchScheduleDate)?->pluck('customerId')?->toArray() ?? [];





        // 1.2: getSchedules - meals
        $schedules = CustomerSubscriptionSchedule::where('scheduleDate', $this->searchScheduleDate)
            ->whereIn('customerId', $customers)
            ->whereIn('status', ['Pending', 'Completed'])?->pluck('id')->toArray() ?? [];




        $scheduleMeals = CustomerSubscriptionScheduleMeal::whereNotNull('mealId')
            ->whereIn('subscriptionScheduleId', $schedules)
            ->orderBy('mealTypeId')->get();







        // --------------------------------------------
        // --------------------------------------------







        // 3: partsWithGrams - ingredientsWithGrams
        $this->partsWithGrams = [];
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





                    // 3.3.2: contentWithGrams
                    $contentWithGrams = $mealSize->contentWithGrams($scheduleMealsByMeal->count() ?? 0);






                    // ---------------------------------
                    // ---------------------------------






                    // 3.3.4: merge
                    $this->partsWithGrams = $this->partsWithGrams + $contentWithGrams->partsWithGrams;

                    $this->ingredientsWithGrams = $this->ingredientsWithGrams + $contentWithGrams->ingredientsWithGrams;




                } // end loop - scheduleMeals






            } // end loop - groupBySize



        } // end loop - groupByMeal







    } // end function








    // -----------------------------------------------------------







    public function viewMeal($id)
    {


        // :: dispatchEvent
        $this->dispatch('viewMeal', $id, $this->unit ?? 1);


    } // end function







    // -----------------------------------------------------------







    public function export()
    {






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
