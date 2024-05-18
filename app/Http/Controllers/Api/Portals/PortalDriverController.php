<?php

namespace App\Http\Controllers\Api\Portals;

use App\Http\Controllers\Controller;
use App\Models\CustomerSubscriptionDelivery;
use App\Models\Driver;
use App\Traits\HelperTrait;
use Illuminate\Http\Request;

class PortalDriverController extends Controller
{


    use HelperTrait;







    public function updateDelivery(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;






        // 1: get instance
        $delivery = CustomerSubscriptionDelivery::find($request->id);




        // 1.2: general
        $delivery->status = $request?->status;
        $delivery->remarks = $request?->remarks ?? null;
        $delivery->imageFile = $request?->imageFileName ?? null;

        $delivery->save();






        // -------------------------------
        // -------------------------------








        // 2: checkBags
        $bags = intval($request?->bags ?? 0);



        if ($bags > 0) {



            // 2.1: getPreviousDeliveries
            $previousDeliveries = CustomerSubscriptionDelivery::where('customerSubscriptionId', $delivery->customerSubscriptionId)
                    ?->where('deliveryDate', '<=', $delivery->deliveryDate)
                    ?->where('isBagCollected', 0)
                    ?->orderBy('deliveryDate')?->get();





            // :: loop - previousDeliveries
            foreach ($previousDeliveries ?? [] as $previousDelivery) {


                $previousDelivery->isBagCollected = true;
                $previousDelivery->save();




                // :: decreaseBag - check
                $bags--;

                if ($bags == 0)
                    break;


            } // end loop






        } // end if - bagExists










        return response()->json(['message' => "Delivery has been {$request->status}"], 200);





    } // end function















    // ------------------------------------------------------------------









    public function updateDeliveryStatus(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;






        // 1: get instance
        $delivery = CustomerSubscriptionDelivery::find($request->id);





        // 1.2: updateStatus
        $delivery->status = $request->status;
        $delivery->save();






        return response()->json(['message' => "Status has been updated"], 200);





    } // end function















    // ------------------------------------------------------------------









    public function updateProfile(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;






        // 1: get instance
        $driver = Driver::find($request->id);

        $driver->name = $request->name;
        $driver->phone = $request->phone;
        $driver->email = $request->email;
        $driver->license = $request->license;
        $driver->plate = $request->plate;




        // 1.2: imageFile - licenseFile
        $driver->imageFile = $request->imageFileName;
        $driver->licenseFile = $request->licenseFileName;


        $driver->save();








        return response()->json(['message' => 'Profile has been updated'], 200);




    } // end function










} // end controller
