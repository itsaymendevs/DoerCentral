<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CustomerSubscriptionSetting;
use Illuminate\Http\Request;

class CustomerSettingsController extends Controller
{




    public function updateSettings(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;






        // 1: get instance
        $settings = CustomerSubscriptionSetting::first();




        // 1.2: general
        $settings->minimumDeliveryDays = $request->minimumDeliveryDays ?? 0;
        $settings->pauseRestriction = $request->pauseRestriction ?? 0;
        $settings->unPauseRestriction = $request->unPauseRestriction ?? 0;
        $settings->skipRestriction = $request->skipRestriction ?? 0;
        $settings->shortenRestriction = $request->shortenRestriction ?? 0;
        $settings->changeCalendarRestriction = $request->changeCalendarRestriction ?? 0;
        $settings->mealSelectionRestriction = $request->mealSelectionRestriction ?? 0;



        $settings->save();



        return response()->json(['message' => "Settings has been updated"], 200);




    } // end function












    // ------------------------------------------------------------------








} // end controller
