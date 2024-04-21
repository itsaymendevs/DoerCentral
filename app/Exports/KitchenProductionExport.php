<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use stdClass;

class KitchenProductionExport implements FromCollection, WithHeadings
{

    // :: variables
    public $scheduleMeals;




    public function __construct($scheduleMeals)
    {


        // :: handleParams
        $this->scheduleMeals = $scheduleMeals;



    } // end function








    // ------------------------------------------------------------------








    public function headings() : array
    {

        return [
            "Type",
            "Name",
            "Total Grams",
            "Meals",
            "Total P/S",
            "Size & Ingredients",
        ];


    } // end headings











    // ------------------------------------------------------------------








    public function collection()
    {



        // :: combineRows
        $combineRows = array();




        // -----------------------------
        // -----------------------------







        //  :: loop - scheduleMeals - groupByType
        foreach ($this->scheduleMeals?->groupBy('mealTypeId') ?? [] as $commonType => $scheduleMealsByType) {




            // :: create instance
            $content = new stdClass();






            //  :: loop - scheduleMeals - groupByMeal
            foreach ($scheduleMealsByType?->groupBy('mealId') ?? [] as $commonMeal => $scheduleMealsByMeal) {






                // 1: type
                $content->type = $scheduleMealsByType?->first()->mealType->name;





                // 2: mealName
                $content->name = "{$scheduleMealsByMeal->first()?->meal?->name}\n{$scheduleMealsByMeal->first()?->meal?->diet?->name}";










                //  ---------------------------
                //  ---------------------------








                //  ** init totalGrams **
                $totalGrams = $totalGramsOfParts = [];
                $content->totalGrams = '';









                //  :: loop - scheduleMeals - groupBySize
                foreach ($scheduleMealsByMeal->groupBy('sizeId') ?? [] as $commonSize => $scheduleMealsBySize) {




                    // ** Get MealSize **
                    $mealSize = $scheduleMealsBySize?->first()?->mealSize();








                    //  A: loop - ingredients - sumGrams
                    foreach ($mealSize?->ingredients ?? [] as $mealSizeIngredient) {




                        // :: sumGrams
                        $totalGrams[$mealSizeIngredient?->ingredientId] =
                            ($totalGrams[$mealSizeIngredient?->ingredientId] ?? 0)
                            + $mealSizeIngredient?->amount * $scheduleMealsBySize->count();



                    } //  end loop - ingredients - sumGrams














                    //  B: loop - parts - sumGrams
                    foreach ($mealSize?->parts ?? [] as $mealSizePart) {



                        // :: sumGrams
                        $totalGramsOfParts[$mealSizePart?->partId] =
                            ($totalGramsOfParts[$mealSizePart?->partId] ?? 0)
                            + $mealSizePart?->amount * $scheduleMealsBySize->count();


                    } //  end loop - parts - sumGrams




                } //  end loop - groupBySize












                //  -------------------------------------
                //  -------------------------------------










                //  A: loop - ingredients - totalGrams
                foreach ($scheduleMealsByMeal->first()?->meal?->ingredients?->groupBy('ingredientId') ?? [] as $commonIngredient => $mealIngredientsByIngredient) {






                    // 3: totalGrams - ingredients
                    $content->totalGrams .= "{$totalGrams[$mealIngredientsByIngredient?->first()?->ingredient?->id]} (G) - {$mealIngredientsByIngredient?->first()?->ingredient?->name}\n";




                } //  end loop - ingredients









                //  B: loop - parts - totalGrams
                foreach ($scheduleMealsByMeal->first()?->meal?->parts?->groupBy('partId') ?? [] as $commonPart => $mealPartsByPart) {




                    // 3: totalGrams - parts
                    $content->totalGrams .= "{$totalGramsOfParts[$mealPartsByPart?->first()?->partId]} (G) - {$mealPartsByPart?->first()?->part?->name}\n";




                } //  end loop - parts













                //  -------------------------------------
                //  -------------------------------------








                //  4: totalMeals
                $content->totalMeals = $scheduleMealsByMeal->count();










                //  -------------------------------------
                //  -------------------------------------







                // ** init totalPerSize **
                $content->totalPerSize = '';








                // :: loop - scheduleMeals - groupBySize
                foreach ($scheduleMealsByMeal->groupBy('sizeId') ?? [] as $commonSize => $scheduleMealsBySize) {



                    // 5: totalPerSize
                    $content->totalPerSize .= "{$scheduleMealsBySize?->first()?->size?->name} / {$scheduleMealsBySize?->count()}\n";



                } // end loop - groupBySize










                //  -------------------------------------
                //  -------------------------------------






                // ** init totalPerSizeWithIngredients **
                $content->totalPerSizeWithIngredients = '';











                // 6: quantityPerSize + its Ingredients / parts




                //  :: loop - scheduleMeals - groupBySize
                foreach ($scheduleMealsByMeal->groupBy('sizeId') ?? [] as $commonSize => $scheduleMealsBySize) {





                    // 6.1: quantityPerSize
                    $content->totalPerSizeWithIngredients .= "{$scheduleMealsBySize?->first()?->size?->name} / {$scheduleMealsBySize?->count()}\n";












                    // 6.2: ingredients / Parts



                    //  ** Get MealSize **
                    $mealSize = $scheduleMealsBySize?->first()?->mealSize();








                    //  A: loop - ingredients
                    foreach ($mealSize?->ingredients ?? [] as $mealSizeIngredient) {




                        //  name - grams
                        $content->totalPerSizeWithIngredients .= "{$mealSizeIngredient?->amount} (G) - {$mealSizeIngredient?->ingredient?->name}\n";




                    } //  end loop - ingredients










                    //  B: loop - parts
                    foreach ($mealSize?->parts ?? [] as $mealSizePart) {




                        //  name - grams
                        $content->totalPerSizeWithIngredients .= "{$mealSizePart?->amount} (G) - {$mealSizePart?->part?->name}\n";





                    } //  end loop - parts









                    // :: extra - emptyLine
                    $content->totalPerSizeWithIngredients .= "\n";





                } //  end loop - groupBySize







            } // end loop - groupByMeal









            // :: append
            array_push($combineRows, $content);




        } // end loop - groupByType













        // :: returnCombineRows
        return collect($combineRows);



    } // end function











    // -------------------------------------------------------------











} // end class
