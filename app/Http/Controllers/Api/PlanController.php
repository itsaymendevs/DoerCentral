<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use App\Models\PlanRange;
use Illuminate\Http\Request;

class PlanController extends Controller
{



    public function storePlan(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;




        // 1: create
        $plan = new Plan();

        $plan->name = $request->name;
        $plan->startingPrice = $request->startingPrice;

        $plan->desc = $request->desc;
        $plan->longDesc = $request->longDesc;




        // 1.2: imageFile
        $plan->imageFile = $request->imageFileName;



        $plan->save();






        return response()->json(['message' => 'Plan has been created'], 200);




    } // end function




    // --------------------------------------------------------------------------------------------











    public function updatePlan(Request $request)
    {




        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;




        // 1: get instance
        $plan = Plan::find($request->id);

        $plan->name = $request->name;
        $plan->startingPrice = $request->startingPrice;

        $plan->desc = $request->desc;
        $plan->longDesc = $request->longDesc;




        // 1.2: imageFile
        if ($request->imageFileName)
            $plan->imageFile = $request->imageFileName;



        $plan->save();






        return response()->json(['message' => 'Plan has been updated'], 200);






    } // end function








    // --------------------------------------------------------------------------------------------








    public function togglePlan(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $id = $request->instance;






        // 1: get instance
        $instance = Plan::find($id);

        $instance->isForWebsite = ! boolval($instance->isForWebsite);

        $instance->save();




        return response()->json(['message' => 'Status has been changed'], 200);



    } // end function






    // --------------------------------------------------------------------------------------------




    public function removePlan(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $id = $request->instance;




        // 1: get instance
        Plan::find($id)->delete();


        return response()->json(['message' => 'Plan has been removed'], 200);



    } // end function








    // --------------------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------------------

















    public function storeRange(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;




        // 1: create
        $range = new PlanRange();

        $range->name = $request->name;
        $range->caloriesRange = $request->caloriesRange;
        $range->desc = $request->desc;




        // 1.2: plan
        $range->planId = $request->planId;




        $range->save();






        return response()->json(['message' => 'Range has been created'], 200);




    } // end function




    // --------------------------------------------------------------------------------------------











    public function updateRange(Request $request)
    {




        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;




        // 1: get instance
        $range = PlanRange::find($request->id);

        $range->name = $request->name;
        $range->caloriesRange = $request->caloriesRange;
        $range->desc = $request->desc;



        $range->save();






        return response()->json(['message' => 'Range has been updated'], 200);






    } // end function








    // --------------------------------------------------------------------------------------------








    public function toggleRange(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $id = $request->instance;






        // 1: get instance
        $instance = PlanRange::find($id);

        $instance->isForWebsite = ! boolval($instance->isForWebsite);

        $instance->save();




        return response()->json(['message' => 'Status has been changed'], 200);



    } // end function






    // --------------------------------------------------------------------------------------------




    public function removeRange(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $id = $request->instance;




        // 1: get instance
        PlanRange::find($id)->delete();


        return response()->json(['message' => 'Range has been removed'], 200);



    } // end function








    // --------------------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------------------







} // end controller
