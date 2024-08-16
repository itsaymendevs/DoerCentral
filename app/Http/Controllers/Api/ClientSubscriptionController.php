<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ClientLead;
use Illuminate\Http\Request;

class ClientSubscriptionController extends Controller
{




    public function storeLead(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;





        // 1: create
        $lead = new ClientLead();



        // 1.2: general
        $lead->name = $request->name ?? null;
        $lead->email = $request->email ?? null;

        $lead->phone = $request->phone ?? null;
        $lead->phoneKey = $request->phoneKey ?? null;

        $lead->landline = $request->landline ?? null;
        $lead->landlineKey = $request->landlineKey ?? null;

        $lead->address = $request->address ?? null;
        $lead->country = $request->country ?? null;

        $lead->users = $request->users ?? null;




        // 1.3: contactPerson
        $lead->contactPerson = $request->contactPerson ?? null;

        $lead->contactPersonPhone = $request->contactPersonPhone ?? null;
        $lead->contactPersonPhoneKey = $request->contactPersonPhoneKey ?? null;


        $lead->contactPersonWhatsapp = $request->contactPersonWhatsapp ?? null;
        $lead->contactPersonWhatsappKey = $request->contactPersonWhatsappKey ?? null;





        // 1.4: tradeFile
        $lead->tradeFile = $request->tradeFileName ?? null;


        $lead->save();







        return response()->json(['message' => "Client has been created"], 200);



    } // end function





} // end controller
