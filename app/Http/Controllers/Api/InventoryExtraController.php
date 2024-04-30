<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Conversion;
use Illuminate\Http\Request;

class InventoryExtraController extends Controller
{




    public function storeConversion(Request $request)
    {



        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;




        // 1: create
        $conversion = new Conversion();

        $conversion->name = $request->name;
        $conversion->save();





        return response()->json(['message' => 'Conversion has been created'], 200);



    } // end function










    // --------------------------------------------------------------------------------------------













    public function updateConversion(Request $request)
    {



        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;




        // 1: create
        $conversion = Conversion::find($request->id);

        $conversion->name = $request->name;
        $conversion->save();





        return response()->json(['message' => 'Conversion has been updated'], 200);



    } // end function










    // --------------------------------------------------------------------------------------------





    public function removeConversion(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $id = $request->instance;




        // 1: get instance
        Conversion::find($id)->delete();


        return response()->json(['message' => 'Conversion has been removed'], 200);



    } // end function







} // end controller
