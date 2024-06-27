<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CustomerSubscription;
use App\Models\CustomerSubscriptionDelivery;
use App\Models\CustomerSubscriptionPause;
use App\Models\CustomerSubscriptionSchedule;
use App\Models\CustomerSubscriptionScheduleMeal;
use App\Models\CustomerSubscriptionScheduleReplacement;
use App\Models\CustomerWallet;
use App\Models\CustomerWalletDeposit;
use App\Traits\HelperTrait;
use Illuminate\Http\Request;

class CustomerMenuController extends Controller
{

    use HelperTrait;





    public function changeCustomerMeal(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;






        // 1: get instance
        $subscriptionDelivery = CustomerSubscriptionDelivery::where('customerSubscriptionId', $request->customerSubscriptionId)
            ->where('deliveryDate', $request->scheduleDate)
            ->first();


        $subscriptionSchedule = CustomerSubscriptionSchedule::where('customerSubscriptionDeliveryId', $subscriptionDelivery?->id)
            ->where('scheduleDate', $request->scheduleDate)
            ->first();






        // 1.2: updateScheduleMeal
        CustomerSubscriptionScheduleMeal::where('subscriptionScheduleId', $subscriptionSchedule->id)
            ->where('mealTypeId', $request->mealTypeId)
            ->update([
                'mealId' => $request->mealId
            ]);






        return response()->json(['message' => "Schedule has been changed"], 200);





    } // end function









    // ------------------------------------------------------------------











    public function updateCustomerMealRemarks(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;






        // 1: update instance
        CustomerSubscriptionScheduleMeal::where('id', $request->id)
            ->update([
                'remarks' => $request->remarks ?? null
            ]);






        return response()->json(['message' => "Remarks has been updated"], 200);





    } // end function











    // ------------------------------------------------------------------












    public function replaceCustomerMeal(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;






        // 1: removePrevious
        CustomerSubscriptionScheduleReplacement::where('scheduleDate', $request->scheduleDate)
            ->where('customerSubscriptionId', $request->customerSubscriptionId)
            ->where('mealTypeId', $request->mealTypeId)
            ->delete();






        // 2: create
        $scheduleReplacement = new CustomerSubscriptionScheduleReplacement();



        // 2.2: general
        $scheduleReplacement->mealId = $request->mealId;
        $scheduleReplacement->mealTypeId = $request->mealTypeId;
        $scheduleReplacement->scheduleDate = $request->scheduleDate;
        $scheduleReplacement->replacementId = $request->replacementId;




        // 2.3: customer - subscription
        $scheduleReplacement->customerId = $request->customerId;
        $scheduleReplacement->customerSubscriptionId = $request->customerSubscriptionId;


        $scheduleReplacement->save();





        return response()->json(['message' => "Meal has been replaced"], 200);





    } // end function



















    // ------------------------------------------------------------------












    public function skipScheduleDay(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;





        // :: getSubscription
        $subscription = CustomerSubscription::find($request->customerSubscriptionId);






        // :: create instance
        $pause = new CustomerSubscriptionPause();




        // 1: general
        $pause->type = 'Refund Wallet';
        $pause->fromDate = $request->scheduleDate;
        $pause->untilDate = $request->scheduleDate;
        $pause->remarks = null;
        $pause->pauseToken = $this->makeGroupToken();







        // -------------------------------
        // -------------------------------






        // 1.2: pauseDays - changeDeliveryStatus - pricePerDay - totalPrice





        // 1.2.1: pauseDays
        $pause->pauseDays = CustomerSubscriptionDelivery::where('customerSubscriptionId', $subscription->id)
            ->where('deliveryDate', '>=', $pause->fromDate)
            ->where('deliveryDate', '<=', $pause->untilDate)
            ->where('status', 'Pending')
            ->count();





        // 1.2.2: changeDeliveryStatus
        CustomerSubscriptionDelivery::where('customerSubscriptionId', $subscription->id)
            ->where('deliveryDate', '>=', $pause->fromDate)
            ->where('deliveryDate', '<=', $pause->untilDate)
            ->where('status', 'Pending')
            ->update([
                "status" => "Skipped",
                "pauseToken" => $pause->pauseToken
            ]);



        // 1.2.3: changeScheduleStatus
        CustomerSubscriptionSchedule::where('customerSubscriptionId', $subscription->id)
            ->where('scheduleDate', '>=', $pause->fromDate)
            ->where('scheduleDate', '<=', $pause->untilDate)
            ->where('status', 'Pending')
            ->update([
                "status" => "Skipped",
                "pauseToken" => $pause->pauseToken
            ]);









        // 1.2.4: pricePerDay - totalPrice
        $pause->pricePerDay = $subscription->pricePerDay();
        $pause->totalPrice = $pause->pricePerDay * $pause->pauseDays;







        // 1.3: customer - subscription
        $pause->customerId = $subscription->customerId;
        $pause->customerSubscriptionId = $subscription->id;



        $pause->save();







        // ------------------------------------
        // ------------------------------------






        // 2: checkPauseType




        // 2.1: refundWallet
        if ($pause->type == 'Refund Wallet') {





            // 2.1.2: createDeposit
            $walletDeposit = new CustomerWalletDeposit();


            // :: general
            $walletDeposit->depositDate = $this->getCurrentDate();
            $walletDeposit->remarks = 'Skip Refund';
            $walletDeposit->amount = $pause->totalPrice;



            // :: pause -  customer - wallet
            $walletDeposit->walletId = $subscription->customer->wallet->id;
            $walletDeposit->customerId = $subscription->customer->id;
            $walletDeposit->subscriptionPauseId = $pause->id;


            $walletDeposit->save();




            // ---------------------------
            // ---------------------------





            // 2.1.2: updateBalance
            $wallet = CustomerWallet::find($subscription->customer->wallet->id);


            $wallet->balance += $pause->totalPrice;
            $wallet->save();




        } // end if







        return response()->json(['message' => "Day has been skipped"], 200);





    } // end function







} // end controller
