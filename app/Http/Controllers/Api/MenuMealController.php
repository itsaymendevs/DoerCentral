<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Meal;
use Illuminate\Http\Request;

class MenuMealController extends Controller
{





    public function removeMeal(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $id = $request->instance;




        // 1: get instance
        Meal::find($id)->delete();


        return response()->json(['message' => 'Item has been removed'], 200);





    } // end function










    // --------------------------------------------------------------------------------------------








} // end controller
