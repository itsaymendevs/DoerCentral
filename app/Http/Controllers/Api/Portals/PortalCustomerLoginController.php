<?php

namespace App\Http\Controllers\Api\Portals;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PortalCustomerLoginController extends Controller
{



    public function checkCustomer(Request $request)
    {

        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;




        // 1: checkCustomer
        $customer = Customer::where('email', $request->email)->first();






        // 1.2: checkValidity - token
        if ($customer && Hash::check($request->password, $customer->password)) {

            $token = $customer->createToken('user', ['role:customer'])->plainTextToken;
            $customerId = $customer->id;
            $customerName = $customer->name;

            return response()->json(['token' => $token, 'customerName' => $customerName, 'customerId' => $customerId], 200);

        } // end if






        // 1.3: un-authorized
        return response()->json(['error' => 'Incorrect Credentials'], 401);



    } // end function




} // end controller




