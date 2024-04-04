<?php

namespace App\Traits;

use App\Models\CustomerSubscription;
use App\Models\CustomerSubscriptionSchedule;
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
            foreach ($calendarSchedule->meals->where('mealTypeId', $mealTypeId)->where($defaultIndex, true) as $scheduleMeal) {




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
        foreach ($calendarSchedule->meals->where('mealTypeId', $mealTypeId)->where('isDefault', 0)->where('isDefaultSecond', 0)->where('isDefaultThird', 0) as $scheduleMeal) {




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











    // ----------------------------------------------------------------








    public function reAssignSchedule($calendarSchedule)
    {



        // 1: getDefaultPlans
        $defaultPlans = $calendarSchedule->calendar->defaultPlans()
                ?->get()?->pluck('planId')?->toArray() ?? [];




        // 1.2: getSubscription
        $subscriptions = CustomerSubscription::whereIn('planId', $defaultPlans)
            ->get()?->pluck('id')?->toArray() ?? [];








        // ---------------------------------
        // ---------------------------------







        // 2: getSubscriptionSchedule
        $subscriptionSchedules = CustomerSubscriptionSchedule::whereIn('customerSubscriptionId', $subscriptions)
            ->where('scheduleDate', $calendarSchedule->scheduleDate)
            ->get();




        // :: loop - subscriptionSchedules
        foreach ($subscriptionSchedules as $subscriptionSchedule) {



            // :: loop - subscriptionScheduleMeals
            foreach ($subscriptionSchedule->meals ?? [] as $scheduleMeal) {





                // TODO 2.1: resetMeal => notInSchedule









                // 2.2:  getMeal - CalendarSchedule
                $scheduleMeal->mealId = $calendarSchedule ? $this->getScheduleMeal($scheduleMeal->subscription, $calendarSchedule, $scheduleMeal->mealTypeId) ?? null : null;



                $scheduleMeal->save();




            } // end loop - schedules


        } // end loop - schedules











    } // end function






} // end trait

