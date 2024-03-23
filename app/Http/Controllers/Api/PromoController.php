<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PromoCode;
use App\Models\PromoCodePlan;
use Illuminate\Http\Request;

class PromoController extends Controller
{



    public function storePromoCode(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;




        // 1: create
        $promoCode = new PromoCode();

        $promoCode->name = $request->name;
        $promoCode->code = $request->code;
        $promoCode->limit = $request->limit;


        // 1.2: percentage / cashAmount
        $promoCode->percentage = $request->percentage ? $request->percentage : null;
        $promoCode->cashAmount = ($request->cashAmount && empty ($request->percentage)) ? $request->cashAmount : null;



        $promoCode->save();





        // 1.3: plans
        foreach ($request->plans as $plan) {


            // :: create
            $promoCodePlan = new PromoCodePlan();

            $promoCodePlan->promoCodeId = $promoCode->id;
            $promoCodePlan->planId = $plan;

            $promoCodePlan->save();


        } // end loop









        return response()->json(['message' => 'Promo has been created'], 200);




    } // end function




    // --------------------------------------------------------------------------------------------











    public function updatePromoCode(Request $request)
    {




        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;




        // 1: get instance
        $promoCode = PromoCode::find($request->id);

        $promoCode->name = $request->name;
        $promoCode->code = $request->code;
        $promoCode->limit = $request->limit;




        // 1.2: percentage / cashAmount
        $promoCode->percentage = $request->percentage ? $request->percentage : null;
        $promoCode->cashAmount = ($request->cashAmount && empty ($request->percentage)) ? $request->cashAmount : null;





        $promoCode->save();






        // 1.3: plans - removePrevious
        PromoCodePlan::where('promoCodeId', $promoCode->id)->delete();


        foreach ($request->plans as $plan) {


            // :: create
            $promoCodePlan = new PromoCodePlan();

            $promoCodePlan->promoCodeId = $promoCode->id;
            $promoCodePlan->planId = $plan;

            $promoCodePlan->save();


        } // end loop








        return response()->json(['message' => 'Promo has been updated'], 200);






    } // end function








    // --------------------------------------------------------------------------------------------








    public function togglePromoCode(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $id = $request->instance;






        // 1: get instance
        $instance = PromoCode::find($id);

        $instance->isActive = ! boolval($instance->isActive);

        $instance->save();




        return response()->json(['message' => 'Status has been changed'], 200);



    } // end function












    // --------------------------------------------------------------------------------------------








    public function togglePromoCodeForWebsite(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $id = $request->instance;






        // 1: get instance
        $instance = PromoCode::find($id);

        $instance->isForWebsite = ! boolval($instance->isForWebsite);

        $instance->save();




        return response()->json(['message' => 'Status has been changed'], 200);



    } // end function









    // --------------------------------------------------------------------------------------------




    public function removePromoCode(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $id = $request->instance;




        // 1: get instance
        PromoCode::find($id)->delete();


        return response()->json(['message' => 'Promo has been removed'], 200);



    } // end function

















} // end controller
