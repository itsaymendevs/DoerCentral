<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\CityDeliveryTime;
use App\Models\Zone;
use App\Models\ZoneDistrict;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{






    public function storeDeliveryTime(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;




        // 1: create
        $deliveryTime = new CityDeliveryTime();

        $deliveryTime->title = $request->title;
        $deliveryTime->deliveryFrom = $request->deliveryFrom;
        $deliveryTime->deliveryUntil = $request->deliveryUntil;




        // 1.2: cityId
        $deliveryTime->cityId = $request->cityId;

        $deliveryTime->save();






        return response()->json(['message' => 'Timing has been created'], 200);




    } // end function




    // --------------------------------------------------------------------------------------------











    public function updateDeliveryTime(Request $request)
    {




        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;




        // 1: get instance
        $deliveryTime = CityDeliveryTime::find($request->id);

        $deliveryTime->title = $request->title;
        $deliveryTime->deliveryFrom = $request->deliveryFrom;
        $deliveryTime->deliveryUntil = $request->deliveryUntil;


        $deliveryTime->save();






        return response()->json(['message' => 'Timing has been updated'], 200);






    } // end function








    // --------------------------------------------------------------------------------------------








    public function toggleDeliveryTime(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $id = $request->instance;






        // 1: get instance
        $instance = CityDeliveryTime::find($id);

        $instance->isActive = ! boolval($instance->isActive);

        $instance->save();




        return response()->json(['message' => 'Status has been changed'], 200);



    } // end function






    // --------------------------------------------------------------------------------------------




    public function removeDeliveryTime(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $id = $request->instance;




        // 1: get instance
        CityDeliveryTime::find($id)->delete();


        return response()->json(['message' => 'Timing has been removed'], 200);



    } // end function








    // --------------------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------------------












    public function storeZone(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;




        // 1: create
        $zone = new Zone();

        $zone->name = $request->name;
        $zone->desc = $request->desc;
        $zone->cityId = $request->cityId;


        // 1.2: imageFile
        $zone->imageFile = $request->imageFileName;

        $zone->save();








        // 2: cityDistricts
        foreach ($request->cityDistricts as $cityDistrict) {


            // 2.1: general
            $zoneDistrict = new ZoneDistrict();

            $zoneDistrict->zoneId = $zone->id;
            $zoneDistrict->cityDistrictId = $cityDistrict;

            $zoneDistrict->save();

        } // end loop








        return response()->json(['message' => 'Zone has been created'], 200);




    } // end function




    // --------------------------------------------------------------------------------------------











    public function updateZone(Request $request)
    {




        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;




        // 1: get instance
        $zone = Zone::find($request->id);

        $zone->name = $request->name;
        $zone->desc = $request->desc;
        $zone->cityId = $request->cityId;



        // 1.2: imageFile
        if ($request->imageFile)
            $zone->imageFile = $request->imageFileName;



        $zone->save();






        return response()->json(['message' => 'Zone has been updated'], 200);






    } // end function











    // --------------------------------------------------------------------------------------------




    public function removeZone(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $id = $request->instance;




        // 1: get instance
        Zone::find($id)->delete();


        return response()->json(['message' => 'Zone has been removed'], 200);



    } // end function








} // end controller
