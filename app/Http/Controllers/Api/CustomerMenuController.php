<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CustomerSubscriptionDelivery;
use App\Models\CustomerSubscriptionSchedule;
use App\Models\CustomerSubscriptionScheduleMeal;
use App\Models\CustomerSubscriptionScheduleReplacement;
use Illuminate\Http\Request;

class CustomerMenuController extends Controller
{




    public function changeCustomerMeal(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;






        // 1: get instance
        $subscriptionSchedule = CustomerSubscriptionSchedule::where('customerSubscriptionId', $request->customerSubscriptionId)
            ->where('scheduleDate', $request->scheduleDate)
            ->first();





        // 1.2: updateScheduleMeal
        CustomerSubscriptionScheduleMeal::where('subscriptionScheduleId', $subscriptionSchedule->id)
            ->where('mealTypeId', $request->mealTypeId)
            ->update([
                'mealId' => $request->mealId
            ]);






        return response()->json(['message' => "Schedule has been changed"], 200);





    } // end function









    // ------------------------------------------------------------------











    public function updateCustomerMealRemarks(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;






        // 1: update instance
        CustomerSubscriptionScheduleMeal::where('id', $request->id)
            ->update([
                'remarks' => $request->remarks ?? null
            ]);






        return response()->json(['message' => "Remarks has been updated"], 200);





    } // end function











    // ------------------------------------------------------------------












    public function replaceCustomerMeal(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;






        // 1: removePrevious
        CustomerSubscriptionScheduleReplacement::where('scheduleDate', $request->scheduleDate)
            ->where('customerSubscriptionId', $request->customerSubscriptionId)
            ->where('mealTypeId', $request->mealTypeId)
            ->delete();






        // 2: create
        $scheduleReplacement = new CustomerSubscriptionScheduleReplacement();



        // 2.2: general
        $scheduleReplacement->mealId = $request->mealId;
        $scheduleReplacement->mealTypeId = $request->mealTypeId;
        $scheduleReplacement->scheduleDate = $request->scheduleDate;
        $scheduleReplacement->replacementId = $request->replacementId;




        // 2.3: customer - subscription
        $scheduleReplacement->customerId = $request->customerId;
        $scheduleReplacement->customerSubscriptionId = $request->customerSubscriptionId;


        $scheduleReplacement->save();





        return response()->json(['message' => "Meal has been replaced"], 200);





    } // end function



















    // ------------------------------------------------------------------












    public function skipScheduleDay(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;






        // 1: update schedule - delivery
        CustomerSubscriptionSchedule::where('customerSubscriptionId', $request->customerSubscriptionId)
            ->where('scheduleDate', $request->scheduleDate)
            ->update([
                'status' => 'Skipped',
            ]);



        CustomerSubscriptionDelivery::where('customerSubscriptionId', $request->customerSubscriptionId)
            ->where('deliveryDate', $request->scheduleDate)
            ->update([
                'status' => 'Skipped',
            ]);






        return response()->json(['message' => "Day has been skipped"], 200);





    } // end function





} // end controller
