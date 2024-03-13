<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\MenuCalendar;
use App\Models\MenuCalendarDiet;
use App\Models\MenuCalendarPlan;
use App\Models\MenuCalendarSchedule;
use App\Models\MenuCalendarScheduleMeal;
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
        if ($request?->diets) {

            foreach ($request->diets as $diet) {


                // 2.1: general
                $calendarDiet = new MenuCalendarDiet();

                $calendarDiet->menuCalendarId = $calendar->id;
                $calendarDiet->dietId = $diet;

                $calendarDiet->save();

            } // end loop

        } // end if







        // 3: plans
        if ($request?->plans) {

            foreach ($request?->plans as $plan) {


                // 3.1: general
                $calendarPlan = new MenuCalendarPlan();

                $calendarPlan->menuCalendarId = $calendar->id;
                $calendarPlan->planId = $plan;

                $calendarPlan->save();

            } // end loop

        } // end if








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


        if ($request?->diets) {

            foreach ($request->diets as $diet) {


                // 2.1: general
                $calendarDiet = new MenuCalendarDiet();

                $calendarDiet->menuCalendarId = $calendar->id;
                $calendarDiet->dietId = $diet;

                $calendarDiet->save();

            } // end loop

        } // end if











        // 3: plans - removePrevious
        $previousPlans = MenuCalendarPlan::where('menuCalendarId', $calendar->id)
            ->get()->pluck('planId')->toArray() ?? [];


        MenuCalendarPlan::where('menuCalendarId', $calendar->id)
            ->whereNotIn('planId', $request?->plans ?? [])->delete();




        if ($request?->plans) {

            foreach ($request?->plans as $plan) {


                // :: checkDuplication
                if (! in_array($plan, $previousPlans)) {


                    // 3.1: general
                    $calendarPlan = new MenuCalendarPlan();

                    $calendarPlan->menuCalendarId = $calendar->id;
                    $calendarPlan->planId = $plan;

                    $calendarPlan->save();


                } // end if



            } // end loop


        } // end if








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












    public function storeCalendarSchedule(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;




        // 1: create
        $schedule = new MenuCalendarSchedule();

        $schedule->scheduleDate = $request->scheduleDate;
        $schedule->menuCalendarId = $request->menuCalendarId;


        $schedule->save();







        return response()->json(['message' => 'Schedule has been created'], 200);




    } // end function









    // --------------------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------------------











    public function updateCalendarScheduleMeal(Request $request)
    {




        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;




        // 1: create - removePrevious
        MenuCalendarScheduleMeal::where('menuCalendarScheduleId', $request->menuCalendarScheduleId)->delete();



        // :: loop - scheduleMeals
        if ($request?->scheduleMeals) {

            foreach ($request?->scheduleMeals as $innerScheduleMeal) {


                // 1.2: create
                $scheduleMeal = new MenuCalendarScheduleMeal();



                // :: general
                $scheduleMeal->scheduleDate = $request->scheduleDate;
                $scheduleMeal->isDefault = boolval($innerScheduleMeal->isDefault);


                // :: meal - mealType - calendarSchedule
                $scheduleMeal->mealId = $innerScheduleMeal->mealId;
                $scheduleMeal->mealTypeId = $innerScheduleMeal->mealTypeId;
                $scheduleMeal->menuCalendarId = $request->menuCalendarId;
                $scheduleMeal->menuCalendarScheduleId = $innerScheduleMeal->menuCalendarScheduleId;

                $scheduleMeal->save();

            } // end loop

        } // end if








        return response()->json(['message' => 'Calendar has been updated'], 200);





    } // end function











    // --------------------------------------------------------------------------------------------







} // end controller
