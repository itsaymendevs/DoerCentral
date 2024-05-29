<?php

namespace App\Traits;

use App\Models\Customer;
use App\Models\CustomerSubscription;
use App\Models\CustomerSubscriptionSchedule;
use App\Models\CustomerSubscriptionScheduleReplacement;
use App\Models\Ingredient;
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
            foreach ($calendarSchedule->meals->where('mealTypeId', $mealTypeId)->where($defaultIndex, true) ?? [] as $scheduleMeal) {





                // A: checkValidity - Allergies - Excludes
                $combinedArray = $this->checkMealValidity($scheduleMeal->mealId);



                $excludes = $combinedArray['excludes'];
                $allergies = $combinedArray['allergies'];




                // 1.4: mealValid
                if (count(array_intersect($allergies, $customerAllergies)) === 0 && count(array_intersect($excludes, $customerExcludes)) === 0) {


                    return $scheduleMeal->mealId;


                } // end if




            } // end loop



        } // end loop - defaults











        // ---------------------------------------
        // ---------------------------------------










        // 2: loop - checkRegular
        foreach ($calendarSchedule->meals->where('mealTypeId', $mealTypeId)->where('isDefault', 0)->where('isDefaultSecond', 0)->where('isDefaultThird', 0) ?? [] as $scheduleMeal) {




            // A: checkValidity - Allergies - Excludes
            $combinedArray = $this->checkMealValidity($scheduleMeal->mealId);


            $excludes = $combinedArray['excludes'];
            $allergies = $combinedArray['allergies'];




            // 1.4: mealValid
            if (count(array_intersect($allergies, $customerAllergies)) === 0 && count(array_intersect($excludes, $customerExcludes)) === 0) {


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
        $combinedArray = $meal?->allergiesAndExcludesInArray();

        $excludes = $combinedArray['excludes'];
        $allergies = $combinedArray['allergies'];
        $excludeIngredients = $combinedArray['excludeIngredients'];
        $allergyIngredients = $combinedArray['allergyIngredients'];




        return ['allergies' => $allergies, 'excludes' => $excludes, 'allergyIngredients' => $allergyIngredients, 'excludeIngredients' => $excludeIngredients];




    } // end function

















    // ----------------------------------------------------------------








    public function checkMealValidityFromCustomer($id, $customerId)
    {





        // 1: getCustomer - allergy - excludes
        $customer = Customer::find($customerId);

        $customerAllergies = $customer?->allergies?->pluck('allergyId')?->toArray() ?? [];
        $customerExcludes = $customer?->excludes?->pluck('excludeId')?->toArray() ?? [];






        // 1.2: getMeal - allergies - excludes
        $meal = Meal::find($id);

        $combinedArray = $meal?->allergiesAndExcludesInArray();




        $excludes = $combinedArray['excludes'];
        $allergies = $combinedArray['allergies'];
        $excludeIngredients = $combinedArray['excludeIngredients'];
        $allergyIngredients = $combinedArray['allergyIngredients'];








        // ----------------------------------------
        // ----------------------------------------







        // 1.3: getIntersect
        $excludes = array_intersect($excludes, $customerExcludes);
        $allergies = array_intersect($allergies, $customerAllergies);



        $excludeIngredients = Ingredient::whereIn('id', $excludeIngredients)
            ->whereIn('excludeId', $excludes)?->pluck('id')->toArray();




        $allergyIngredients = Ingredient::whereIn('id', $allergyIngredients)
            ->whereIn('allergyId', $allergies)?->pluck('id')->toArray();









        return ['allergies' => $allergies ?? [], 'excludes' => $excludes ?? [], 'excludeIngredients' => $excludeIngredients ?? [], 'allergyIngredients' => $allergyIngredients ?? []];




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
        foreach ($subscriptionSchedules ?? [] as $subscriptionSchedule) {






            // :: loop - subscriptionScheduleMeals
            foreach ($subscriptionSchedule->meals ?? [] as $scheduleMeal) {




                // 2.1: get calendarScheduleMeals - checkIfExists
                $calendarScheduleMeals = $calendarSchedule?->meals?->where('mealTypeId', $scheduleMeal->mealTypeId)?->pluck('mealId')?->toArray() ?? [];




                /* :: This Was The Condition ! in_array($scheduleMeal->mealId, $calendarScheduleMeals)
                   :: Now => im overriding regardless */
                if (true) {





                    // :: getSubscription
                    $subscription = CustomerSubscription::find($scheduleMeal->subscription->id);



                    // 2.2:  getMeal - CalendarSchedule
                    $scheduleMeal->mealId = $calendarSchedule ? $this->getScheduleMeal($subscription, $calendarSchedule, $scheduleMeal->mealTypeId) ?? null : null;



                    $scheduleMeal->save();






                    // 2.3: removeReplacement
                    CustomerSubscriptionScheduleReplacement::where('customerSubscriptionId', $scheduleMeal->subscriptionId)
                        ->where('scheduleDate', $calendarSchedule->scheduleDate)
                        ->where('mealTypeId', $scheduleMeal->mealTypeId)
                        ->delete();




                } // end if







            } // end loop - schedules


        } // end loop - schedules






    } // end function






} // end trait

