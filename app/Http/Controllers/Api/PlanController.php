<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\MenuCalendarPlan;
use App\Models\Plan;
use App\Models\PlanBundle;
use App\Models\PlanBundleDay;
use App\Models\PlanBundleRangePrice;
use App\Models\PlanBundleType;
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






        // --------------------------
        // --------------------------




        // 2: createBundleRange



        // 2.1: getBundles
        $bundles = PlanBundle::where('planId', $range->planId)->get();

        foreach ($bundles as $bundle) {


            // 1: create BundleRange
            $bundleRange = new PlanBundleRangePrice();


            $bundleRange->pricePerDay = 0;
            $bundleRange->planRangeId = $range->id;
            $bundleRange->planBundleId = $bundle->id;


            $bundleRange->save();



        } // end loop






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











    public function storeBundle(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;




        // 1: create
        $bundle = new PlanBundle();

        $bundle->name = $request->name;
        $bundle->remarks = $request->remarks ?? null;
        $bundle->imageFile = $request->imageFileName ?? null;




        // 1.2: plan
        $bundle->planId = $request->planId;


        $bundle->save();




        // -------------------------
        // -------------------------






        // 2: mealTypes
        if ($request?->mealTypes) {

            foreach ($request->mealTypes as $mealType) {


                // 2.1: create
                $bundleType = new PlanBundleType();

                $bundleType->planBundleId = $bundle->id;
                $bundleType->mealTypeId = $mealType;

                $bundleType->save();

            } // end loop

        } // end if












        // --------------------------
        // --------------------------




        // 3: create bundleRanges



        // 2.1: getRanges
        $ranges = PlanRange::where('planId', $bundle->planId)->get();

        foreach ($ranges as $range) {


            // 1: create BundleRange
            $bundleRange = new PlanBundleRangePrice();


            $bundleRange->pricePerDay = 0;
            $bundleRange->planRangeId = $range->id;
            $bundleRange->planBundleId = $bundle->id;


            $bundleRange->save();



        } // end loop









        return response()->json(['message' => 'Bundle has been created'], 200);




    } // end function




    // --------------------------------------------------------------------------------------------











    public function updateBundle(Request $request)
    {




        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;




        // 1: get instance
        $bundle = PlanBundle::find($request->id);


        $bundle->name = $request->name;
        $bundle->remarks = $request->remarks ?? null;
        $bundle->imageFile = $request->imageFileName ?? null;


        $bundle->save();







        // -------------------------
        // -------------------------








        // 2: mealTypes - removePrevious
        PlanBundleType::where('planBundleId', $bundle->id)->delete();


        if ($request?->mealTypes) {

            foreach ($request->mealTypes as $mealType) {


                // 2.1: create
                $bundleType = new PlanBundleType();

                $bundleType->planBundleId = $bundle->id;
                $bundleType->mealTypeId = $mealType;

                $bundleType->save();

            } // end loop

        } // end if









        return response()->json(['message' => 'Bundle has been updated'], 200);






    } // end function










    // --------------------------------------------------------------------------------------------











    public function toggleBundle(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $id = $request->instance;






        // 1: get instance
        $instance = PlanBundle::find($id);

        $instance->isForWebsite = ! boolval($instance->isForWebsite);

        $instance->save();




        return response()->json(['message' => 'Status has been changed'], 200);



    } // end function








    // --------------------------------------------------------------------------------------------








    public function removeBundle(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $id = $request->instance;




        // 1: get instance
        PlanBundle::find($id)->delete();


        return response()->json(['message' => 'Bundle has been removed'], 200);



    } // end function













    // --------------------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------------------














    public function updateBundleRange(Request $request)
    {




        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;




        // 1: get instance
        $bundleRange = PlanBundleRangePrice::find($request->id);

        $bundleRange->pricePerDay = $request->pricePerDay;

        $bundleRange->save();





        return response()->json(['message' => 'Range has been updated'], 200);





    } // end function













    // --------------------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------------------













    public function storeBundleDay(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;




        // 1: create
        $bundleDay = new PlanBundleDay();

        $bundleDay->days = $request->days;
        $bundleDay->discount = $request->discount;



        // 1.2: planBundle
        $bundleDay->planBundleId = $request->planBundleId;


        $bundleDay->save();






        return response()->json(['message' => 'Day has been created'], 200);




    } // end function




    // --------------------------------------------------------------------------------------------











    public function updateBundleDay(Request $request)
    {




        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;




        // 1: get instance
        $bundleDay = PlanBundleDay::find($request->id);


        $bundleDay->days = $request->days;
        $bundleDay->discount = $request->discount;


        $bundleDay->save();




        return response()->json(['message' => 'Day has been updated'], 200);






    } // end function















    // --------------------------------------------------------------------------------------------








    public function removeBundleDay(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $id = $request->instance;




        // 1: get instance
        PlanBundleDay::find($id)->delete();


        return response()->json(['message' => 'Day has been removed'], 200);



    } // end function
















    // --------------------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------------------








    public function toggleCalendarDefault(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $id = $request->instance;






        // 1: get instance
        $instance = MenuCalendarPlan::find($id);

        $instance->isDefault = ! boolval($instance->isDefault);

        $instance->save();




        return response()->json(['message' => 'Status has been changed'], 200);



    } // end function








    // --------------------------------------------------------------------------------------------






} // end controller
