<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\CityDeliveryTime;
use App\Models\CityHoliday;
use App\Models\CustomerSubscriptionDelivery;
use App\Models\Driver;
use App\Models\DriverZone;
use App\Models\Vehicle;
use App\Models\Zone;
use App\Models\ZoneDistrict;
use App\Traits\DeliveryTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DeliveryController extends Controller
{


    use DeliveryTrait;



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










    public function updateCharge(Request $request)
    {




        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;




        // 1: get instance
        $city = City::find($request->id);

        $city->deliveryCharge = $request->deliveryCharge;

        $city->save();





        return response()->json(['message' => 'Charge has been updated'], 200);






    } // end function









    // --------------------------------------------------------------------------------------------











    public function updateHoliday(Request $request)
    {




        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;




        // 1: get instance
        $holiday = CityHoliday::find($request->id);

        $holiday->message = $request->message;

        $holiday->save();






        return response()->json(['message' => 'Weekday has been updated'], 200);






    } // end function








    // --------------------------------------------------------------------------------------------








    public function toggleHoliday(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $id = $request->instance;






        // 1: get instance
        $instance = CityHoliday::find($id);

        $instance->isActive = ! boolval($instance->isActive);

        $instance->save();




        return response()->json(['message' => 'Status has been changed'], 200);



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
        if ($request->imageFileName)
            $zone->imageFile = $request->imageFileName;






        // 2: cityDistricts - removePrevious
        ZoneDistrict::where('zoneId', $zone->id)->delete();


        foreach ($request->cityDistricts as $cityDistrict) {


            // 2.1: general
            $zoneDistrict = new ZoneDistrict();

            $zoneDistrict->zoneId = $zone->id;
            $zoneDistrict->cityDistrictId = $cityDistrict;

            $zoneDistrict->save();

        } // end loop






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

























    // --------------------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------------------












    public function storeDriver(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;




        // 1: create
        $driver = new Driver();

        $driver->name = $request->name;
        $driver->phone = $request->phone;
        $driver->email = $request->email;
        $driver->password = Hash::make($request->password);
        $driver->license = $request->license ?? null;




        // 1.2: imageFile - license
        $driver->imageFile = $request->imageFileName ?? null;
        $driver->licenseFile = $request->licenseFileName ?? null;
        $driver->licenseRearFile = $request->licenseRearFileName ?? null;




        // 1.3: shiftType
        $driver->shiftTypeId = $request->shiftTypeId;
        $driver->vehicleId = $request?->vehicleId ?? null;



        $driver->save();








        // 2: driverZones
        foreach ($request->zones as $zone) {


            // 2.1: general
            $driverZone = new DriverZone();

            $driverZone->driverId = $driver->id;
            $driverZone->zoneId = $zone;

            $driverZone->save();

        } // end loop









        // -------------------------------------
        // -------------------------------------







        // 3: reAssignDrivers
        $this->reAssignDrivers();









        return response()->json(['message' => 'Driver has been created'], 200);




    } // end function








    // --------------------------------------------------------------------------------------------











    public function updateDriver(Request $request)
    {




        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;




        // 1: get instance
        $driver = Driver::find($request->id);





        // 1.2: checkShift
        if ($driver->shiftTypeId != $request->shiftTypeId) {


            CustomerSubscriptionDelivery::where('driverId', $driver->id)
                ->where('deliveryDate', '>=', $this->getCurrentDate())
                ->update([
                    'driverId' => null
                ]);

        } // end if








        // ---------------------------------------------
        // ---------------------------------------------





        // :: continue




        // 1.3: general
        $driver->name = $request->name;
        $driver->phone = $request->phone;
        $driver->email = $request->email;
        $driver->license = $request->license ?? null;



        // 1.2: imageFile - license
        $driver->imageFile = $request->imageFileName;
        $driver->licenseFile = $request->licenseFileName;
        $driver->licenseRearFile = $request->licenseRearFileName;




        // 1.3: shiftType - vehicle
        $driver->shiftTypeId = $request->shiftTypeId;
        $driver->vehicleId = $request?->vehicleId ?? null;








        // 1.4: resetPassword
        if ($request?->password)
            $driver->password = Hash::make($request->password);





        $driver->save();







        // -------------------------------
        // -------------------------------








        // 2: driverZones - update
        DriverZone::where('driverId', $driver->id)->delete();


        foreach ($request->zones as $zone) {

            // 2.1: general
            $driverZone = new DriverZone();

            $driverZone->driverId = $driver->id;
            $driverZone->zoneId = $zone;

            $driverZone->save();

        } // end loop













        // -------------------------------------
        // -------------------------------------







        // 3: reAssignDrivers
        $this->reAssignDrivers();









        return response()->json(['message' => 'Driver has been updated'], 200);






    } // end function











    // --------------------------------------------------------------------------------------------




    public function removeDriver(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $id = $request->instance;




        // 1: get instance
        Driver::find($id)->delete();


        return response()->json(['message' => 'Driver has been removed'], 200);



    } // end function


















    // --------------------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------------------












    public function storeVehicle(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;




        // 1: create
        $vehicle = new Vehicle();

        $vehicle->name = $request->name;
        $vehicle->type = $request->type;
        $vehicle->plate = $request->plate;
        $vehicle->issueDate = $request->issueDate;
        $vehicle->expiryDate = $request->expiryDate ?? null;




        // 1.2: imageFile - plate - insurance - ownership
        $vehicle->imageFile = $request->imageFileName ?? null;
        $vehicle->plateFile = $request->plateFileName ?? null;
        $vehicle->insuranceFile = $request->insuranceFileName ?? null;
        $vehicle->ownershipFile = $request->ownershipFileName ?? null;



        $vehicle->save();











        return response()->json(['message' => 'Vehicle has been created'], 200);




    } // end function




    // --------------------------------------------------------------------------------------------











    public function updateVehicle(Request $request)
    {




        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;




        // 1: get instance
        $vehicle = Vehicle::find($request->id);




        // 1.2: general
        $vehicle->name = $request->name;
        $vehicle->type = $request->type;
        $vehicle->plate = $request->plate;
        $vehicle->issueDate = $request->issueDate;
        $vehicle->expiryDate = $request->expiryDate ?? null;




        // 1.2: imageFile - plate - insurance - ownership
        $vehicle->imageFile = $request?->imageFileName;
        $vehicle->plateFile = $request?->plateFileName;
        $vehicle->insuranceFile = $request?->insuranceFileName;
        $vehicle->ownershipFile = $request?->ownershipFileName;



        $vehicle->save();





        return response()->json(['message' => 'Vehicle has been updated'], 200);





    } // end function











    // --------------------------------------------------------------------------------------------




    public function removeVehicle(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $id = $request->instance;




        // 1: get instance
        Vehicle::find($id)->delete();


        return response()->json(['message' => 'Vehicle has been removed'], 200);



    } // end function














} // end controller
