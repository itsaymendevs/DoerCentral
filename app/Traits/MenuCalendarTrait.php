<?php

namespace App\Traits;

use App\Models\Meal;
use stdClass;


trait MenuCalendarTrait
{





    public function getScheduleMeal($subscription, $calendarSchedule, $mealTypeId)
    {




        // 1: getCustomer - allergy - excludes
        $customerAllergies = $subscription->customer?->allergies?->pluck('allergyId')?->toArray() ?? [];
        $customerExcludes = $subscription->customer?->excludes?->pluck('excludeId')?->toArray() ?? [];






        // 1.2: checkDefault - 3x
        foreach (['isDefault', 'isDefaultSecond', 'isDefaultThird'] as $defaultIndex) {


            // 1.3: loop - scheduleMeals
            foreach ($calendarSchedule->meals->where('mealTypeId', $mealTypeId)
            ->where($defaultIndex, true) as $scheduleMeal) {




                // A: checkValidity - Allergies - Excludes
                $combinedArray = $this->checkMealValidity($scheduleMeal->mealId);


                $allergyIngredients = $combinedArray['allergies'];
                $excludeIngredients = $combinedArray['excludes'];




                // 1.4: mealValid
                if (empty(array_intersect($allergyIngredients, $customerAllergies)) && empty(array_intersect($excludeIngredients, $customerExcludes))) {


                    return $scheduleMeal->mealId;


                } // end if




            } // end loop



        } // end loop - defaults









        // ---------------------------------------
        // ---------------------------------------








        // 2: loop - checkRegular
        foreach ($calendarSchedule->meals->where('mealTypeId', $mealTypeId)
        ->where('isDefault', 0)
        ->where('isDefaultSecond', 0)
        ->where('isDefaultThird', 0) as $scheduleMeal) {




            // A: checkValidity - Allergies - Excludes
            $combinedArray = $this->checkMealValidity($scheduleMeal->mealId);


            $allergyIngredients = $combinedArray['allergies'];
            $excludeIngredients = $combinedArray['excludes'];




            // 1.4: mealValid
            if (empty(array_intersect($allergyIngredients, $customerAllergies)) && empty(array_intersect($excludeIngredients, $customerExcludes))) {


                return $scheduleMeal->mealId;


            } // end if




        } // end loop








        // :: notFound
        return null;


    } // end function










    // ----------------------------------------------------------------








    public function checkMealValidity($id)
    {




        // 1: getMeal - allergies - excludes
        $meal = Meal::find($id);



        // :: getBoth
        $combinedArray = $meal->allergiesAndExcludesInArray();

        $excludes = $combinedArray['excludes'];
        $allergies = $combinedArray['allergies'];



        return ['allergies' => $allergies, 'excludes' => $excludes];




    } // end function






} // end trait

