<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Jobs\ReAssignScheduleJob;
use App\Models\CustomerSubscription;
use App\Models\CustomerSubscriptionSchedule;
use App\Models\MenuCalendar;
use App\Models\MenuCalendarDiet;
use App\Models\MenuCalendarPlan;
use App\Models\MenuCalendarSchedule;
use App\Models\MenuCalendarScheduleMeal;
use App\Traits\HelperTrait;
use App\Traits\MenuCalendarTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class MenuCalendarController extends Controller
{


    use HelperTrait;
    use MenuCalendarTrait;




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










    public function cloneCalendar(Request $request)
    {




        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;




        // 1: get source
        $sourceSchedules = MenuCalendarSchedule::where('menuCalendarId', $request->menuCalendarId)
            ->where('scheduleDate', '>=', $request->cloneFromDate)
            ->where('scheduleDate', '<=', $request->cloneUntilDate)
            ->get();








        // 2: loop - schedules
        $dateCounter = 0;
        $numberOfDays = $this->differentInDays($request->cloneFromDate, $request->cloneUntilDate);

        foreach ($sourceSchedules ?? [] as $key => $sourceSchedule) {



            // 2.1: getScheduleDate
            $scheduleDate = date('Y-m-d', strtotime("{$request->fromDate} +{$dateCounter} days"));





            // 2.2: checkSchedule
            $schedule = MenuCalendarSchedule::where('scheduleDate', $scheduleDate)
                ->where('menuCalendarId', $sourceSchedule->menuCalendarId)
                ->first();



            if (! $schedule) {



                // 2.3.5: create instance
                $schedule = new MenuCalendarSchedule();

                $schedule->scheduleDate = $scheduleDate;
                $schedule->menuCalendarId = $sourceSchedule->menuCalendarId;


                $schedule->save();









                // ----------------------------------------------
                // ----------------------------------------------






                // 2.5: assignCalendarSchedule for subscription






                // 2.5.1: getDefaultPlans
                $defaultPlans = $schedule->calendar->defaultPlans()
                        ?->get()?->pluck('planId')?->toArray() ?? [];






                // 2.5.2: getSubscription - updateCalendarSchedule
                $subscriptions = CustomerSubscription::whereIn('planId', $defaultPlans)
                    ->get()?->pluck('id')?->toArray() ?? [];




                CustomerSubscriptionSchedule::whereIn('customerSubscriptionId', $subscriptions)
                    ->where('scheduleDate', $schedule->scheduleDate)
                    ->whereNull('menuCalendarScheduleId')
                    ->update([
                        'menuCalendarScheduleId' => $schedule->id,
                    ]);


            } // end if - exists








            // ------------------------------------------------
            // ------------------------------------------------








            // 3: scheduleMeals




            // 3.1: removePrevious
            MenuCalendarScheduleMeal::where('menuCalendarScheduleId', $schedule->id)->delete();




            // 3.2: getSourceMeals
            foreach ($sourceSchedule?->meals ?? [] as $key => $sourceScheduleMeal) {




                // 3.2.1: create instance
                $scheduleMeal = new MenuCalendarScheduleMeal();



                // :: general
                $scheduleMeal->scheduleDate = $scheduleDate;
                $scheduleMeal->isDefault = boolval($sourceScheduleMeal?->isDefault);
                $scheduleMeal->isDefaultSecond = boolval($sourceScheduleMeal?->isDefaultSecond);
                $scheduleMeal->isDefaultThird = boolval($sourceScheduleMeal?->isDefaultThird);



                // :: meal - mealType - calendarSchedule
                $scheduleMeal->mealId = $sourceScheduleMeal->mealId;
                $scheduleMeal->mealTypeId = $sourceScheduleMeal->mealTypeId;
                $scheduleMeal->menuCalendarId = $schedule->menuCalendarId;
                $scheduleMeal->menuCalendarScheduleId = $schedule->id;

                $scheduleMeal->save();





            } // end loop - scheduleMeals










            // ----------------------------------------------
            // ----------------------------------------------







            // 4: re-assign schedule [Job] - runQueue
            $calendarSchedule = MenuCalendarSchedule::find($schedule->id);

            ReAssignScheduleJob::dispatch($calendarSchedule);






            // 5: inc. counter
            $dateCounter++;





        } // end loop - sourceSchedules






        // ---------------------------------------------------------
        // ---------------------------------------------------------





        // :: queue - run
        Artisan::call('queue:work --stop-when-empty');






        return response()->json(['message' => 'Calendar has been cloned'], 200);





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









        // ----------------------------------------------
        // ----------------------------------------------






        // 2: assignCalendarSchedule for subscription






        // 2.1: getDefaultPlans
        $defaultPlans = $schedule->calendar->defaultPlans()
                ?->get()?->pluck('planId')?->toArray() ?? [];






        // 2.2: getSubscription - updateCalendarSchedule
        $subscriptions = CustomerSubscription::whereIn('planId', $defaultPlans)
            ->get()?->pluck('id')?->toArray() ?? [];




        CustomerSubscriptionSchedule::whereIn('customerSubscriptionId', $subscriptions)
            ->where('scheduleDate', $schedule->scheduleDate)
            ->whereNull('menuCalendarScheduleId')
            ->update([
                'menuCalendarScheduleId' => $schedule->id,
            ]);








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



                // :: general - group
                $scheduleMeal->scheduleDate = $request->scheduleDate;
                $scheduleMeal->isDefault = boolval($innerScheduleMeal?->isDefault);
                $scheduleMeal->isDefaultSecond = boolval($innerScheduleMeal?->isDefaultSecond);
                $scheduleMeal->isDefaultThird = boolval($innerScheduleMeal?->isDefaultThird);



                // :: meal - mealType - calendarSchedule
                $scheduleMeal->mealId = $innerScheduleMeal->mealId;
                $scheduleMeal->mealTypeId = $innerScheduleMeal->mealTypeId;
                $scheduleMeal->menuCalendarId = $request->menuCalendarId;
                $scheduleMeal->menuCalendarScheduleId = $innerScheduleMeal->menuCalendarScheduleId;

                $scheduleMeal->save();

            } // end loop

        } // end if










        // ----------------------------------------------
        // ----------------------------------------------







        // 2: re-assign schedule [Job] - runQueue
        $calendarSchedule = MenuCalendarSchedule::find($request->menuCalendarScheduleId);

        ReAssignScheduleJob::dispatch($calendarSchedule);


        // :: queue - run
        Artisan::call('queue:work --stop-when-empty');












        return response()->json(['message' => 'Calendar has been updated'], 200);





    } // end function











    // --------------------------------------------------------------------------------------------












    public function updateCalendarScheduleMealDefault(Request $request)
    {




        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;




        // 1: get instance
        $scheduleMeal = MenuCalendarScheduleMeal::find($request->id);




        // 1.2: removeCurrentDefault
        MenuCalendarScheduleMeal::where('menuCalendarScheduleId', $scheduleMeal->menuCalendarScheduleId)
            ->where('mealTypeId', $scheduleMeal->mealTypeId)
            ->update([
                "isDefault" => false
            ]);




        // 1.3: updateDefault
        $scheduleMeal->isDefault = true;
        $scheduleMeal->save();






        return response()->json(['message' => 'Default has been updated'], 200);





    } // end function











    // --------------------------------------------------------------------------------------------












} // end controller
