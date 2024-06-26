<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Meal;
use Illuminate\Http\Request;

class MenuMealController extends Controller
{







    public function updateMealLists(Request $request)
    {



        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;




        // 1: get instance
        $meal = Meal::find($request->id);


        // 1.2: general
        $meal->isForMenu = boolval($request->isForMenu);
        $meal->isForAddons = boolval($request->isForAddons);


        $meal->save();





        return response()->json(['message' => 'Lists has been updated'], 200);







    } // end function








    // --------------------------------------------------------------------------------------------






    public function removeMeal(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $id = $request->instance;




        // 1: get instance
        Meal::find($id)->delete();


        return response()->json(['message' => 'Item has been removed'], 200);





    } // end function











} // end controller
