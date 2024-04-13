<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CustomerSubscriptionScheduleMeal;
use Illuminate\Http\Request;

class KitchenTodayController extends Controller
{




    public function cookMeals(Request $request)
    {



        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;







        // 1: updateStatus
        $scheduleMeals = CustomerSubscriptionScheduleMeal::where('mealId', $request->mealId)
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










} // end controller
