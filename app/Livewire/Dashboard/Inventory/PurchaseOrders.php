<?php

namespace App\Livewire\Dashboard\Inventory;

use App\Models\CustomerSubscriptionDelivery;
use App\Models\CustomerSubscriptionSchedule;
use App\Models\CustomerSubscriptionScheduleMeal;
use App\Models\Ingredient;
use App\Models\IngredientCategory;
use App\Models\Supplier;
use App\Models\SupplierIngredient;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;

class PurchaseOrders extends Component
{



    use HelperTrait;




    // :: variables
    public $searchScheduleDate, $searchScheduleUntilDate, $ingredientsWithGrams, $searchIngredient;
    public $toKG = true, $unit = 1, $toTotal = false;
    public $cart = [];








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
            foreach ($scheduleMealsByMeal->groupBy('sizeId') as $commonSize => $scheduleMealsBySize) {





                // 3.3: loop - scheduleMeals
                foreach ($scheduleMealsBySize as $scheduleMeal) {



                    // 3.3.1: getMealSize
                    $mealSize = $scheduleMeal->mealSize();





                    // ---------------------------------
                    // ---------------------------------





                    // 3.3.2: getIngredientsWithGrams
                    $mealSizeIngredientsWithGrams = $mealSize?->ingredientsWithGrams() ?? [];





                    // 3.3.3: multiplyByMeals
                    // $mealSizeIngredientsWithGramsMultiplied = array_map(function ($element) use ($scheduleMealsByMeal) {

                    //     return $element * ($scheduleMealsByMeal->count() ?? 0);

                    // }, $mealSizeIngredientsWithGrams);






                    // ---------------------------------
                    // ---------------------------------






                    // 3.3.4: merge
                    $sumArray = [];

                    foreach (array_keys($this->ingredientsWithGrams + ($mealSizeIngredientsWithGrams ?? [])) as $key) {

                        $sumArray[$key] = (isset($this->ingredientsWithGrams[$key]) ? $this->ingredientsWithGrams[$key] : 0) + (isset($mealSizeIngredientsWithGrams[$key]) ? $mealSizeIngredientsWithGrams[$key] : 0);

                    } // end loop


                    $this->ingredientsWithGrams = $sumArray;




                } // end loop - scheduleMeals






            } // end loop - groupBySize



        } // end loop - groupByMeal




    } // end function








    // -----------------------------------------------------------








    public function append($ingredient, $supplier)
    {



        // 1: check ingredient
        if (! in_array($ingredient, array_column($this->cart, 'ingredientId'))) {


            array_push($this->cart, ['ingredientId' => $ingredient, 'supplierId' => $supplier]);
            $this->alert('success', 'Added to Cart');



            // 2: exists
        } else {


            $this->alert('info', 'Already in Cart!');


        } // end if





    } // end function











    // -----------------------------------------------------------








    public function remove($ingredient, $supplier)
    {


        // 1: dependencies
        $cartDuplicate = $this->cart;



        // 1.2: filterCart
        $this->cart = array_filter($cartDuplicate ?? [], function ($item, $key) use ($ingredient) {

            return $item['ingredientId'] != $ingredient;

        }, ARRAY_FILTER_USE_BOTH);





    } // end function











    // -----------------------------------------------------------








    #[On('resetCart')]
    public function resetCart()
    {


        // 1: resetCart
        $this->cart = [];


    } // end function









    // -----------------------------------------------------------








    public function confirmPurchase()
    {



        // 1: dispatchEvent
        $this->dispatch('confirmPurchase', $this->cart, $this->ingredientsWithGrams, $this->unit);




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
            ->get();







        // -----------------------------------------
        // -----------------------------------------






        // 1.3: getSuppliers
        $supplierIngredients = SupplierIngredient::whereIn('ingredientId', $ingredients?->pluck('id')?->toArray() ?? [])->get();





        return view('livewire.dashboard.inventory.purchase-orders', compact('categories', 'ingredients', 'supplierIngredients'));






    } // end function



} // end class
