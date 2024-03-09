<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\MenuCalendar;
use App\Models\MenuCalendarDiet;
use App\Models\MenuCalendarPlan;
use Illuminate\Http\Request;

class MenuCalendarController extends Controller
{




    public function storeCalendar(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;




        // 1: create
        $calendar = new MenuCalendar();

        $calendar->name = $request->name;
        $calendar->desc = $request->desc;



        // 1.2: imageFile
        $calendar->imageFile = $request->imageFileName;

        $calendar->save();








        // -------------------------
        // -------------------------








        // 2: diets
        foreach ($request->diets as $diet) {


            // 2.1: general
            $calendarDiet = new MenuCalendarDiet();

            $calendarDiet->menuCalendarId = $calendar->id;
            $calendarDiet->dietId = $diet;

            $calendarDiet->save();

        } // end loop







        // 3: plans
        foreach ($request->plans as $plan) {


            // 3.1: general
            $calendarPlan = new MenuCalendarPlan();

            $calendarPlan->menuCalendarId = $calendar->id;
            $calendarPlan->planId = $plan;

            $calendarPlan->save();

        } // end loop









        return response()->json(['message' => 'Calendar has been created'], 200);




    } // end function




    // --------------------------------------------------------------------------------------------











    public function updateCalendar(Request $request)
    {




        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;




        // 1: get instance
        $calendar = MenuCalendar::find($request->id);

        $calendar->name = $request->name;
        $calendar->desc = $request->desc;



        // 1.2: imageFile
        $calendar->imageFile = $request->imageFileName ?? null;

        $calendar->save();








        // -------------------------
        // -------------------------








        // 2: diets - removePrevious
        MenuCalendarDiet::where('menuCalendarId', $calendar->id)?->delete();


        foreach ($request->diets as $diet) {


            // 2.1: general
            $calendarDiet = new MenuCalendarDiet();

            $calendarDiet->menuCalendarId = $calendar->id;
            $calendarDiet->dietId = $diet;

            $calendarDiet->save();

        } // end loop









        // 3: plans - removePrevious
        MenuCalendarPlan::where('menuCalendarId', $calendar->id)?->delete();


        foreach ($request->plans as $plan) {


            // 3.1: general
            $calendarPlan = new MenuCalendarPlan();

            $calendarPlan->menuCalendarId = $calendar->id;
            $calendarPlan->planId = $plan;

            $calendarPlan->save();

        } // end loop








        return response()->json(['message' => 'Calendar has been updated'], 200);





    } // end function

















    // --------------------------------------------------------------------------------------------








    public function removeCalendar(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $id = $request->instance;




        // 1: get instance
        MenuCalendar::find($id)->delete();


        return response()->json(['message' => 'Calendar has been removed'], 200);



    } // end function












    // --------------------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------------------








} // end controller
