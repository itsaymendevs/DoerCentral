<?php

namespace App\Http\Controllers\Api\Portals;

use App\Http\Controllers\Controller;
use App\Models\Driver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PortalDriverLoginController extends Controller
{



    public function checkDriver(Request $request)
    {

        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;




        // 1: checkDriver
        $driver = Driver::where('email', $request->email)->first();






        // 1.2: checkValidity - token
        if ($driver && Hash::check($request->password, $driver->password)) {

            $token = $driver->createToken('user', ['role:driver'])->plainTextToken;
            $driverId = $driver->id;
            $driverName = $driver->name;

            return response()->json(['token' => $token, 'driverName' => $driverName, 'driverId' => $driverId], 200);

        } // end if






        // 1.3: un-authorized
        return response()->json(['error' => 'Incorrect Credentials'], 401);



    } // end function




} // end controller




