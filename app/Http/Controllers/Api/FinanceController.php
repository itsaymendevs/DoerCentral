<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PaymentMethod;
use App\Traits\HelperTrait;
use Illuminate\Http\Request;

class FinanceController extends Controller
{


    use HelperTrait;




    public function updatePaymentMethod(Request $request)
    {



        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;




        // 1: get instance
        $method = PaymentMethod::find($request->id);



        // 1.2: liveKeys
        $method->envKey = $request->envKey ?? null;
        $method->envSecondKey = $request->envSecondKey ?? null;
        $method->envThirdKey = $request->envThirdKey ?? null;
        $method->envFourthKey = $request->envFourthKey ?? null;




        // 1.3: testKeys
        $method->envTestKey = $request->envTestKey ?? null;
        $method->envTestSecondKey = $request->envTestSecondKey ?? null;
        $method->envTestThirdKey = $request->envTestThirdKey ?? null;
        $method->envTestFourthKey = $request->envTestFourthKey ?? null;




        $method->save();





        return response()->json(['message' => 'Payment has been updated'], 200);






    } // end function












    // --------------------------------------------------------------------------------------------











    public function togglePaymentMethod(Request $request)
    {



        // :: root
        $request = json_decode(json_encode($request->all()));
        $id = $request->instance;




        // 1: get instance
        $method = PaymentMethod::find($id);


        $method->isActive = ! boolval($method->isActive);
        $method->save();




        return response()->json(['message' => 'Status has been updated'], 200);




    } // end function












    // --------------------------------------------------------------------------------------------











    public function togglePaymentMethodLive(Request $request)
    {



        // :: root
        $request = json_decode(json_encode($request->all()));
        $id = $request->instance;




        // 1: get instance
        $method = PaymentMethod::find($id);


        $method->isLive = ! boolval($method->isLive);
        $method->save();




        return response()->json(['message' => 'Status has been updated'], 200);




    } // end function







} // end controller
