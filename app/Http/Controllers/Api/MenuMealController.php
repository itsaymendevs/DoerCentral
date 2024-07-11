<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Meal;
use App\Models\MealMenu;
use Illuminate\Http\Request;

class MenuMealController extends Controller
{







    public function updateMealLists(Request $request)
    {



        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;




        // 1: checkValue
        $mealMenu = MealMenu::where('mealId', $request->mealId)?->where('menuId', $request->menuId)?->first();



        // 1.2: create - remove
        if ($mealMenu) {

            MealMenu::where('mealId', $request->mealId)->where('menuId', $request->menuId)->delete();


        } else {



            // 1.3: create instance
            $mealMenu = new MealMenu();

            $mealMenu->mealId = $request->mealId;
            $mealMenu->menuId = $request->menuId;

            $mealMenu->save();


        } // end if





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
