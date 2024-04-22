<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CustomerSubscriptionSchedule;
use App\Models\CustomerSubscriptionScheduleMeal;
use Illuminate\Http\Request;

class KitchenTodayController extends Controller
{




    public function cookMeals(Request $request)
    {



        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;




        // 1: getSchedule
        $schedules = CustomerSubscriptionSchedule::where('scheduleDate', $request->scheduleDate)
            ->get()?->pluck('id')?->toArray();







        // 1.2: updateStatus
        $scheduleMeals = CustomerSubscriptionScheduleMeal::whereIn('subscriptionScheduleId', $schedules)
            ->where('mealId', $request->mealId)
            ->where('mealTypeId', $request->mealTypeId)
            ->where('cookStatus', 'Pending')
            ->update([
                'cookStatus' => 'Cooked',
            ]);





        // -----------------------------
        // -----------------------------




        // TODO: continue with deducting from stock



        return response()->json(['message' => 'Meals has been marked as cooked'], 200);





    } // end function










    // --------------------------------------------------------------------------------------------











    public function packMeals(Request $request)
    {



        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;




        // 1: getSchedule
        $schedules = CustomerSubscriptionSchedule::where('scheduleDate', $request->scheduleDate)
            ->where('customerSubscriptionId', $request->customerSubscriptionId)
            ->get()?->pluck('id')?->toArray();







        // 1.2: updateStatus
        $scheduleMeals = CustomerSubscriptionScheduleMeal::whereIn('subscriptionScheduleId', $schedules)
            ->where('cookStatus', 'Cooked')
            ->update([
                'cookStatus' => 'Packed',
            ]);





        // -----------------------------
        // -----------------------------






        return response()->json(['message' => 'Meals has been marked as packed'], 200);





    } // end function














} // end controller
