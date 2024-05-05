<?php

namespace App\Exports;

use App\Models\Bag;
use App\Models\MealType;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use stdClass;

class KitchenPackingExport implements FromCollection, WithHeadings
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



        // 1: dependencies
        $mealTypes = MealType::all();
        $headingsArray = ["SN", "Customer", "Plan"];




        // -----------------------------
        // -----------------------------




        // 1.2: loop - mealTypes
        foreach ($mealTypes as $mealType) {

            array_push($headingsArray, $mealType->name);
            array_push($headingsArray, $mealType->name . ' Size');
            array_push($headingsArray, $mealType->name . ' Remarks');


        }// end loop






        // -----------------------------
        // -----------------------------





        // 1.3: continue
        array_push($headingsArray, 'C-Bag');




        return $headingsArray;




    } // end headings











    // ------------------------------------------------------------------








    public function collection()
    {



        // :: combineRows - dependencies
        $combineRows = array();

        $counter = 1;
        $mealTypes = MealType::all();
        $bag = Bag::whereIn('name', ['Cool Bag', 'Cooler Bag'])->first();








        // -----------------------------
        // -----------------------------








        // :: loop - scheduleMeals - groupBySubscription
        foreach ($this->scheduleMeals?->groupBy('customerSubscriptionId') ?? [] as $commonSubscription => $scheduleMealsBySubscription) {







            // :: create instance
            $content = new stdClass();



            // 1: SN
            $content->SN = $counter++;




            // 2: customer - plan
            $content->customer = $scheduleMealsBySubscription?->first()?->customer->fullName();
            $content->plan = $scheduleMealsBySubscription?->first()->subscription?->plan->name;









            //  ---------------------------
            //  ---------------------------




            //  :: loop - mealTypes
            foreach ($mealTypes as $mealType) {




                //  ** get getScheduleMeal **
                $scheduleMealBySubscription = $scheduleMealsBySubscription?->where('mealTypeId', $mealType->id)?->first();






                // 3: meal - size - remarks
                $content->{$mealType->name} = $scheduleMealBySubscription?->meal?->name ?? '';
                $content->{$mealType->name . ' Size'} = $scheduleMealBySubscription?->size?->name ?? '';
                $content->{$mealType->name . ' Remarks'} = $scheduleMealBySubscription?->remarks ?? '';





            } // end loop - mealTypes









            //  ---------------------------
            //  ---------------------------






            // 4: bag
            $content->bag = $scheduleMealsBySubscription?->first()->subscription?->bag?->name ==
                $bag->name ? 'YES' : 'NO';








            // :: append
            array_push($combineRows, $content);




        } // end loop - groupBySubscription













        // :: returnCombineRows
        return collect($combineRows);



    } // end function











    // -------------------------------------------------------------











} // end class


