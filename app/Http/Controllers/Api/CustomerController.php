<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BagRefund;
use App\Models\Customer;
use App\Models\CustomerAddress;
use App\Models\CustomerAllergy;
use App\Models\CustomerDeliveryDay;
use App\Models\CustomerExclude;
use App\Models\CustomerSubscription;
use App\Models\CustomerSubscriptionDelivery;
use App\Models\CustomerSubscriptionExtend;
use App\Models\CustomerSubscriptionPause;
use App\Models\CustomerSubscriptionSchedule;
use App\Models\CustomerSubscriptionScheduleMeal;
use App\Models\CustomerSubscriptionSetting;
use App\Models\CustomerSubscriptionShorten;
use App\Models\CustomerSubscriptionType;
use App\Models\CustomerWallet;
use App\Models\CustomerWalletDeposit;
use App\Models\MealType;
use App\Models\PlanBundleRange;
use App\Traits\CalendarTrait;
use App\Traits\HelperTrait;
use App\Traits\MenuCalendarTrait;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{



    use HelperTrait;
    use MenuCalendarTrait;





    public function updateCustomer(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;




        // 1: get instance
        $customer = Customer::find($request->id);


        // 1.2: general
        $customer->firstName = $request->firstName;
        $customer->lastName = $request->lastName;

        $customer->email = $request->email;
        $customer->birthDate = $request->birthDate ?? null;
        $customer->phone = $request->phone;
        $customer->whatsapp = $request->whatsapp;
        $customer->weight = $request->weight ?? null;
        $customer->height = $request->height ?? null;
        $customer->bagRemarks = $request->bagRemarks ?? null;





        // 1.3: resetPassword
        $request->newPassword ? $customer->password = Hash::make($request->newPassword) : null;







        // 1.4: isVIP - isEnabled
        $customer->isVIP = boolval($request->isVIP) === true ? true : false;
        $customer->isEnabled = boolval($request->isEnabled) === true ? true : false;


        // 1.5: manager - driver
        $customer->managerId = $request->managerId ?? null;
        $customer->driverId = $request->driverId ?? null;




        $customer->save();









        // ---------------------------------
        // ---------------------------------








        // 2: allergy - removePrevious
        CustomerAllergy::where('customerId', $customer->id)->delete();


        foreach ($request->allergyLists ?? [] as $allergyList) {


            // :: create
            $customerAllergy = new CustomerAllergy();

            $customerAllergy->customerId = $customer->id;
            $customerAllergy->allergyId = $allergyList;

            $customerAllergy->save();

        } // end loop









        // 2: exclude - removePrevious
        CustomerExclude::where('customerId', $customer->id)->delete();


        foreach ($request->excludeLists ?? [] as $excludeList) {


            // :: create
            $customerExclude = new CustomerExclude();

            $customerExclude->customerId = $customer->id;
            $customerExclude->excludeId = $excludeList;

            $customerExclude->save();

        } // end loop









        return response()->json(['message' => 'Information has been updated'], 200);




    } // end function













    // ------------------------------------------------------------------







    public function removeCustomer(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $id = $request->instance;




        // 1: get instance
        Customer::find($id)->delete();


        return response()->json(['message' => 'Customer has been removed'], 200);



    } // end function















    // ------------------------------------------------------------------
    // ------------------------------------------------------------------
    // ------------------------------------------------------------------











    public function storeWalletDeposit(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;




        // 1: create
        $deposit = new CustomerWalletDeposit();


        // 1.2: general
        $deposit->amount = doubleval($request->amount);
        $deposit->remarks = $request->remarks ?? null;
        $deposit->depositDate = $request->depositDate;




        // 1.3: customer - wallet
        $deposit->walletId = $request->walletId;
        $deposit->customerId = $request->customerId;



        $deposit->save();







        // ---------------------------
        // ---------------------------





        // 2: increaseBalance
        $wallet = CustomerWallet::find($request->walletId);


        $wallet->balance += doubleval($request->amount);
        $wallet->save();






        return response()->json(['message' => 'Balance has been updated'], 200);




    } // end function


















    // ------------------------------------------------------------------
    // ------------------------------------------------------------------
    // ------------------------------------------------------------------











    public function storeBagRefund(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;





        // :: getSubscription
        $subscription = CustomerSubscription::find($request->customerSubscriptionId);







        // 1: create
        $bagRefund = new BagRefund();


        // 1.2: general
        $bagRefund->refundDate = $this->getCurrentDate();
        $bagRefund->remarks = "Cool-bag Refunds";
        $bagRefund->amount = $subscription?->bagPrice ?? 0;


        $bagRefund->customerId = $subscription->customer->id;
        $bagRefund->customerSubscriptionId = $subscription->id;



        $bagRefund->save();









        // ----------------------------------------
        // ----------------------------------------





        // 2: create
        $deposit = new CustomerWalletDeposit();


        // 1.2: general
        $deposit->amount = doubleval($bagRefund->amount);
        $deposit->remarks = "Cool-bag Refunds";
        $deposit->depositDate = $this->getCurrentDate();




        // 1.3: customer - wallet
        $deposit->walletId = $subscription->customer->wallet->id;
        $deposit->customerId = $subscription->customer->id;



        $deposit->save();







        // ---------------------------
        // ---------------------------





        // 2: increaseBalance
        $wallet = CustomerWallet::find($subscription->customer->wallet->id);


        $wallet->balance += doubleval($bagRefund->amount);
        $wallet->save();






        return response()->json(['message' => 'Refund has been confirmed'], 200);




    } // end function














    // ------------------------------------------------------------------
    // ------------------------------------------------------------------
    // ------------------------------------------------------------------















    public function updateCustomerBundleTypes(Request $request)
    {



        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;




        // :: getSubscription
        $subscription = CustomerSubscription::find($request->latestSubscriptionId);







        // :: loop - bundleTypes - mealTypes
        foreach ($request->bundleTypes ?? [] as $mealTypeId => $quantity) {




            // 1: getSubscriptionType
            $subscriptionType = CustomerSubscriptionType::where('mealTypeId', $mealTypeId)
                ->where('customerSubscriptionId', $subscription->id)
                ->first();



            // 1.2: updateQuantity
            $subscriptionType->quantity = $quantity;
            $subscriptionType->save();




        } // end loop










        return response()->json(['message' => 'Bundle has been updated'], 200);






    } // end function

















    // ------------------------------------------------------------------













    public function pauseCustomerSubscription(Request $request)
    {



        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;



        // :: getSubscription
        $subscription = CustomerSubscription::find($request->customerSubscriptionId);






        // :: create instance
        $pause = new CustomerSubscriptionPause();




        // 1: general
        $pause->type = $request->type;
        $pause->fromDate = $request->fromDate;
        $pause->untilDate = $request->untilDate;
        $pause->remarks = $request->remarks ?? null;
        $pause->pauseToken = $this->makeGroupToken();







        // -------------------------------
        // -------------------------------






        // 1.2: pauseDays - changeDeliveryStatus - pricePerDay - totalPrice





        // 1.2.1: pauseDays
        $pause->pauseDays = CustomerSubscriptionDelivery::where('customerSubscriptionId', $subscription->id)
            ->where('deliveryDate', '>=', $request->fromDate)
            ->where('deliveryDate', '<=', $request->untilDate)
            ->where('status', 'Pending')
            ->count();





        // 1.2.2: changeDeliveryStatus
        CustomerSubscriptionDelivery::where('customerSubscriptionId', $subscription->id)
            ->where('deliveryDate', '>=', $request->fromDate)
            ->where('deliveryDate', '<=', $request->untilDate)
            ->where('status', 'Pending')
            ->update([
                "status" => "Paused",
                "pauseToken" => $pause->pauseToken
            ]);



        // 1.2.3: changeScheduleStatus
        CustomerSubscriptionSchedule::where('customerSubscriptionId', $subscription->id)
            ->where('scheduleDate', '>=', $request->fromDate)
            ->where('scheduleDate', '<=', $request->untilDate)
            ->where('status', 'Pending')
            ->update([
                "status" => "Paused",
                "pauseToken" => $pause->pauseToken
            ]);









        // 1.2.4: pricePerDay - totalPrice
        $pause->pricePerDay = $subscription->pricePerDay();
        $pause->totalPrice = $pause->pricePerDay * $pause->pauseDays;







        // 1.3: customer - subscription
        $pause->customerId = $subscription->customerId;
        $pause->customerSubscriptionId = $request->customerSubscriptionId;



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
            $walletDeposit->remarks = 'Pause Refund';
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














        return response()->json(['message' => 'Subscription has been paused'], 200);






    } // end function















    // ------------------------------------------------------------------













    public function unPauseCustomerSubscription(Request $request)
    {



        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;








        // :: getSubscription
        $subscription = CustomerSubscription::find($request->customerSubscriptionId);






        // :: get instance
        $pause = CustomerSubscriptionPause::find($request->id);




        // 1: general
        $pause->isCanceled = true;
        $pause->cancellationDate = $this->getCurrentDate();

        $pause->save();










        // -------------------------------
        // -------------------------------



        // :: subscriptionSettings
        $subscriptionSettings = CustomerSubscriptionSetting::all()->first();








        // 1.2: pauseDays - changeDeliveryStatus - pricePerDay - totalPrice





        // 1.2.1: pausedDays
        $pausedDays = CustomerSubscriptionDelivery::where('customerSubscriptionId', $subscription->id)
            ->where('deliveryDate', '>=', $this->getDateByDays($subscriptionSettings->unPauseRestriction))
            ->where('deliveryDate', '<=', $pause->untilDate)
            ->where('pauseToken', $pause->pauseToken)
            ->whereIn('status', ['Paused', 'Skipped'])
            ->count();






        // 1.2.2: changeDeliveryStatus
        CustomerSubscriptionDelivery::where('customerSubscriptionId', $subscription->id)
            ->where('deliveryDate', '>=', $this->getDateByDays($subscriptionSettings->unPauseRestriction))
            ->where('deliveryDate', '<=', $pause->untilDate)
            ->where('pauseToken', $pause->pauseToken)
            ->whereIn('status', ['Paused', 'Skipped'])
            ->update([
                "status" => "Pending"
            ]);




        // 1.2.3: changeScheduleStatus
        CustomerSubscriptionSchedule::where('customerSubscriptionId', $subscription->id)
            ->where('scheduleDate', '>=', $this->getDateByDays($subscriptionSettings->unPauseRestriction))
            ->where('scheduleDate', '<=', $pause->untilDate)
            ->where('pauseToken', $pause->pauseToken)
            ->whereIn('status', ['Paused', 'Skipped'])
            ->update([
                "status" => "Pending"
            ]);









        // 1.2.4: pricePerDay - totalPrice :: ONLY LEFTOVER PAUSE DAYS
        $pricePerDay = $subscription->pricePerDay();
        $totalPrice = $pause->pricePerDay * $pausedDays;




        // ------------------------------------
        // ------------------------------------






        // 2: checkPauseType




        // 2.1: restoreRefundWallet
        if ($pause->type == 'Refund Wallet') {




            // 2.1.2: refundWalletDeposit
            $wallet = CustomerWallet::find($subscription->customer->wallet->id);


            $wallet->balance -= $totalPrice;
            $wallet->save();




        } // end if














        return response()->json(['message' => 'Subscription has been un-paused'], 200);






    } // end function















    // ------------------------------------------------------------------











    public function extendCustomerSubscription(Request $request)
    {




        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;



        // :: getSubscription - customer - deliveryDays
        $subscription = CustomerSubscription::find($request->customerSubscriptionId);
        $customer = Customer::find($subscription->customerId);











        // ------------------------------------------
        // ------------------------------------------








        // :: create instance
        $extend = new CustomerSubscriptionExtend();




        // 1: general
        $extend->fromDate = $request->fromDate;
        $extend->extendDays = $request->extendDays;
        $extend->reason = $request->reason;
        $extend->remarks = $request->remarks ?? null;







        // 1.2: imageFile - pricePerDay
        $extend->imageFile = $request->imageFileName ?? null;
        $extend->pricePerDay = $subscription->pricePerDay();






        // 1.3: customer - subscription
        $extend->customerId = $subscription->customerId;
        $extend->customerSubscriptionId = $request->customerSubscriptionId;





        $extend->save();





        // -------------------------------
        // -------------------------------





        // 1.4: deliveryInformation



        // :: storeDelivery
        $this->storeExtendDelivery($subscription, $customer, $extend);







        return response()->json(['message' => 'Subscription has been extended'], 200);





    } // end function
















    // ------------------------------------------------------------------













    public function storeExtendDelivery($subscription, $customer, $extend)
    {



        // :: root
        $dateCounter = 0;
        $deliveryCounter = 0;
        $deliveryWeekDays = $customer->deliveryWeekDays();






        // :: loop
        while (true) {




            // 1: getDeliveryDate - deliveryAsWeekDay
            $deliveryDate = date('Y-m-d', strtotime($extend->fromDate . "+{$dateCounter} days"));
            $deliveryAsWeekDay = date('l', strtotime($deliveryDate));






            // :: ifExists
            if (in_array($deliveryAsWeekDay, $deliveryWeekDays)) {




                // :: checkDelivery
                $subscriptionDelivery = CustomerSubscriptionDelivery::where('customerSubscriptionId', $subscription->id)
                    ->where('deliveryDate', $deliveryDate)
                    ->where('status', 'Canceled')
                    ->first();







                // 1.2: exists
                if ($subscriptionDelivery) {



                    // :: updateStatus
                    $subscriptionDelivery->status = 'Pending';
                    $subscriptionDelivery->save();





                    // 1.2: create
                } else {




                    // :: create
                    $subscriptionDelivery = new CustomerSubscriptionDelivery();



                    // 1.2.1: general
                    $subscriptionDelivery->deliveryDate = $deliveryDate;
                    $subscriptionDelivery->status = 'Pending';


                    // 1.2.2: customer - customerSubscription
                    $subscriptionDelivery->customerId = $customer->id;
                    $subscriptionDelivery->planId = $subscription->planId;
                    $subscriptionDelivery->customerSubscriptionId = $subscription->id;



                    $subscriptionDelivery->save();




                } // end if













                // ---------------------------------------------
                // ---------------------------------------------







                // 1.4.5: scheduleInformation



                // :: side-phase - storeSchedule - Meals
                $this->storeExtendSchedule($subscription, $customer, $extend, $subscriptionDelivery);









                // ---------------------------------------------
                // ---------------------------------------------









                // 1.2.3: increaseCounter
                $deliveryCounter++;





                // 1.2.4: updateSubscription - UntilDate
                $subscription->untilDate = $deliveryDate;
                $subscription->save();




            } // end if








            // ----------------------------
            // ----------------------------





            // :: beyondExtendDays
            if ($deliveryCounter >= $extend->extendDays) {


                // :: save untilDate - totalPrice
                $extend->untilDate = $deliveryDate;
                $extend->totalPrice = $extend->pricePerDay * $extend->extendDays;
                $extend->save();

                break;

            } // end if







            // :: nextDate
            $dateCounter++;


        } // end loop







    } // end function













    // ------------------------------------------------------------------











    public function storeExtendSchedule($subscription, $customer, $extend, $subscriptionDelivery)
    {



        // :: getCalendarSchedule
        $calendarSchedule = $subscription?->calendar?->scheduleByDate($subscriptionDelivery->deliveryDate) ?? null;








        // 1: checkSchedule
        $existingSchedule = CustomerSubscriptionSchedule::where('customerSubscriptionId', $subscription->id)
            ->where('scheduleDate', $subscriptionDelivery->deliveryDate)
            ->where('status', 'Canceled')
            ->first();






        // 1.2: exists
        if ($existingSchedule) {



            // 1.3: updateStatus - calendarSchedule
            $existingSchedule->status = 'Pending';
            $existingSchedule->menuCalendarScheduleId = $calendarSchedule?->id ?? null;


            $existingSchedule->save();





            // 1.2: create
        } else {




            // :: create
            $schedule = new CustomerSubscriptionSchedule();




            // 1.2: general
            $schedule->status = 'Pending';
            $schedule->scheduleDate = $subscriptionDelivery->deliveryDate;





            // 1.3: calendarSchedule - subscriptionDelivery
            $schedule->menuCalendarScheduleId = $calendarSchedule?->id ?? null;
            $schedule->customerSubscriptionDeliveryId = $subscriptionDelivery->id;



            // 1.3: customer - customerSubscription
            $schedule->customerId = $customer->id;
            $schedule->planId = $subscription->planId;
            $schedule->customerSubscriptionId = $subscription->id;



            $schedule->save();





            // ---------------------------------------------
            // ---------------------------------------------









            // :: loop - mealTypes - checkQuantity
            foreach ($subscription->types ?? [] as $subscriptionType) {

                if ($subscriptionType->quantity > 0) {




                    // 2: create
                    $scheduleMeal = new CustomerSubscriptionScheduleMeal();


                    // 2.2: general
                    $scheduleMeal->cookStatus = 'Pending';
                    $scheduleMeal->mealTypeId = $subscriptionType->mealTypeId;





                    // 2.3: subscriptionSchedule - customer - customerSubscription
                    $scheduleMeal->subscriptionScheduleId = $schedule?->id ?? null;

                    $scheduleMeal->customerId = $customer->id;
                    $scheduleMeal->planId = $subscription->planId;
                    $scheduleMeal->customerSubscriptionId = $subscription->id;





                    // 2.4:  getMeal - CalendarSchedule (HELPER IN MenuCalendarTrait)
                    $scheduleMeal->mealId = $calendarSchedule ? $this->getScheduleMeal($subscription, $calendarSchedule, $subscriptionType->mealTypeId) ?? null : null;











                    // ---------------------------------------
                    // ---------------------------------------







                    // 2.5: bundleRangeType - price - size
                    $planBundleRange = PlanBundleRange::where('planBundleId', $subscription?->planBundleId)
                        ->where('planRangeId', $subscription?->planRangeId)
                        ->where('isForWebsite', true)
                        ->first();





                    // 2.5.1: getBundleRangeType
                    $bundleRangeType = $planBundleRange?->typeByMealType($subscriptionType->mealTypeId) ?? null;




                    // 2.5.2: bundleRangeType - price - size
                    $scheduleMeal->sizeId = $bundleRangeType?->sizeId ?? null;
                    $scheduleMeal->sizePrice = $bundleRangeType?->price ?? null;
                    $scheduleMeal->sizeCalories = $bundleRangeType?->calories ?? null;

                    $scheduleMeal->bundleRangeTypeId = $bundleRangeType?->id ?? null;







                    $scheduleMeal->save();





                } // end if - quantity

            } // end loop


        } // end if




    } // end function













    // ------------------------------------------------------------------











    public function shortenCustomerSubscription(Request $request)
    {




        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;



        // :: getSubscription - customer
        $subscription = CustomerSubscription::find($request->customerSubscriptionId);
        $customer = Customer::find($subscription->customer->id);











        // ------------------------------------------
        // ------------------------------------------





        // :: check if shortenValid
        $hasPendingDays = CustomerSubscriptionDelivery::where('customerSubscriptionId', $subscription->id)
            ->where('deliveryDate', '>=', $request->untilDate)
            ->where('deliveryDate', '<=', $request->fromDate)
            ->where('status', 'Pending')
            ->count();



        // :: noPendingDelivery
        if ($hasPendingDays == 0) {


            return response()->json(['message' => 'No Pending delivery has been found'], 200);


        } // end if







        // --------------------------------------------
        // --------------------------------------------










        // :: create instance
        $shorten = new CustomerSubscriptionShorten();




        // 1: general
        $shorten->fromDate = $request->fromDate;
        $shorten->untilDate = $request->untilDate;
        $shorten->reason = $request->reason;
        $shorten->remarks = $request->remarks ?? null;







        // 1.2: imageFile - pricePerDay
        $shorten->imageFile = $request->imageFileName ?? null;
        $shorten->pricePerDay = $subscription->pricePerDay();






        // 1.3: customer - subscription
        $shorten->customerId = $customer->id;
        $shorten->customerSubscriptionId = $request->customerSubscriptionId;





        $shorten->save();





        // -------------------------------
        // -------------------------------







        // 2: shortenDays - changeDeliveryStatus - changeScheduleStatus
        $shorten->shortenDays = CustomerSubscriptionDelivery::where('customerSubscriptionId', $subscription->id)
            ->where('deliveryDate', '>=', $shorten->untilDate)
            ->where('deliveryDate', '<=', $shorten->fromDate)
            ->where('status', 'Pending')
            ->count();


        CustomerSubscriptionDelivery::where('customerSubscriptionId', $subscription->id)
            ->where('deliveryDate', '>=', $shorten->untilDate)
            ->where('deliveryDate', '<=', $shorten->fromDate)
            ->where('status', 'Pending')
            ->update([
                "status" => "Canceled"
            ]);




        CustomerSubscriptionSchedule::where('customerSubscriptionId', $subscription->id)
            ->where('scheduleDate', '>=', $shorten->untilDate)
            ->where('scheduleDate', '<=', $shorten->fromDate)
            ->where('status', 'Pending')
            ->update([
                "status" => "Canceled"
            ]);








        // 2.1: getTotalPrice
        $shorten->totalPrice = $shorten->pricePerDay * $shorten->shortenDays;

        $shorten->save();






        // 2.2: updateSubscription
        $subscription->untilDate = date('Y-m-d', strtotime($shorten->untilDate . ' -1 day +4 hours'));

        $subscription->save();








        return response()->json(['message' => 'Subscription has been shortened'], 200);












    } // end function











    // ------------------------------------------------------------------
    // ------------------------------------------------------------------
    // ------------------------------------------------------------------












    public function storeCustomerAddress(Request $request)
    {



        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;




        // 1: create
        $customerAddress = new CustomerAddress();




        // 1.2: general
        $customerAddress->name = $request->name;
        $customerAddress->locationAddress = $request->locationAddress ?? null;
        $customerAddress->apartment = $request->apartment ?? null;
        $customerAddress->floor = $request->floor ?? null;





        // 1.3: customer - city - district - deliveryTime
        $customerAddress->customerId = $request->customerId;
        $customerAddress->cityId = $request->cityId;
        $customerAddress->cityDistrictId = $request->cityDistrictId ?? null;
        $customerAddress->deliveryTimeId = $request->deliveryTimeId ?? null;




        $customerAddress->save();







        // ----------------------------
        // ----------------------------








        // 2: deliveryDays
        foreach ($request->deliveryDays ?? [] as $weekDay => $isChecked) {


            // :: isChecked
            if (boolval($isChecked)) {




                // 2.1: removeSimilar
                CustomerDeliveryDay::where('customerId', $customerAddress->customer->id)
                    ->where('weekDay', $weekDay)->delete();






                // 2.2: create
                $customerDeliveryDay = new CustomerDeliveryDay();


                $customerDeliveryDay->weekDay = $weekDay;
                $customerDeliveryDay->customerAddressId = $customerAddress->id;
                $customerDeliveryDay->customerId = $customerAddress->customer->id;


                $customerDeliveryDay->save();


            } // end if


        } // end loop









        return response()->json(['message' => 'Address has been created'], 200);




    } // end function
















    // ------------------------------------------------------------------











    public function updateCustomerAddress(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;




        // 1: get instance
        $customerAddress = CustomerAddress::find($request->id);


        // 1.2: general
        $customerAddress->name = $request->name;
        $customerAddress->locationAddress = $request->locationAddress ?? null;
        $customerAddress->apartment = $request->apartment ?? null;
        $customerAddress->floor = $request->floor ?? null;





        // 1.3: city - district - deliveryTime
        $customerAddress->cityId = $request->cityId;
        $customerAddress->cityDistrictId = $request->cityDistrictId ?? null;
        $customerAddress->deliveryTimeId = $request->deliveryTimeId ?? null;




        $customerAddress->save();







        // ----------------------------
        // ----------------------------





        // 2: checkChanges
        $currentDeliveryDays = CustomerDeliveryDay::where('customerAddressId', $customerAddress->id)?->pluck('weekDay')?->toArray() ?? [];


        $deliveryDays = array_filter((array) $request->deliveryDays ?? [], function ($value, $key) {

            return $value == true;

        }, ARRAY_FILTER_USE_BOTH);

        $deliveryDays = array_keys($deliveryDays ?? []);






        // 2.1: getDifferent
        $isDifferent = array_merge(array_diff($currentDeliveryDays, $deliveryDays) ?? [], array_diff($deliveryDays, $currentDeliveryDays) ?? []);




        if (count($isDifferent ?? []) == 0) {

            return response()->json(['message' => 'General Address has been updated'], 200);

        } // end if










        // ----------------------------
        // ----------------------------






        // 3: deliveryDays - removePrevious
        CustomerDeliveryDay::where('customerAddressId', $customerAddress->id)->delete();


        foreach ($request->deliveryDays ?? [] as $weekDay => $isChecked) {


            // :: isChecked
            if (boolval($isChecked)) {



                // 3.1: removeSimilar
                CustomerDeliveryDay::where('customerId', $customerAddress->customer->id)
                    ->where('weekDay', $weekDay)->delete();





                // 3.2: create
                $customerDeliveryDay = new CustomerDeliveryDay();


                $customerDeliveryDay->weekDay = $weekDay;
                $customerDeliveryDay->customerAddressId = $customerAddress->id;
                $customerDeliveryDay->customerId = $customerAddress->customer->id;


                $customerDeliveryDay->save();


            } // end if


        } // end loop









        // -------------------------------------
        // -------------------------------------







        // 4: adjustDelivery



        // 4.1: hasActiveSubscription
        if ($customerAddress->customer->currentSubscription()->untilDate >= $this->getNextDate()) {

            $this->adjustCustomerSchedule($customerAddress->customerId);

        } // end if




        // 4.2: hasUpcomingSubscription
        if ($customerAddress->customer->hasUpcomingSubscription()) {

            $this->adjustCustomerUpcomingSchedule($customerAddress->customerId);

        } // end if








        return response()->json(['message' => 'Address has been updated'], 200);




    } // end function














    // ------------------------------------------------------------------







    public function removeCustomerAddress(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $id = $request->instance;




        // 1: get instance
        CustomerAddress::find($id)->delete();


        return response()->json(['message' => 'Address has been removed'], 200);



    } // end function



















    // ------------------------------------------------------------------
    // ------------------------------------------------------------------
    // ------------------------------------------------------------------
    // ---------------------------- HELPERS -----------------------------









    protected function adjustCustomerSchedule($id)
    {




        // 1: get customer
        $customer = Customer::find($id);






        // 1.2: currentSubscription - adjustDelivery
        $subscription = $customer->currentSubscription();





        // 1.3: getStartDate
        $startDate = $this->getNextDate();

        if ($subscription?->startDate >= $startDate)
            $startDate = $subscription->startDate;





        $this->adjustDelivery($subscription, $customer, $startDate);








    } // end function









    // -----------------------
    // -----------------------











    protected function adjustCustomerUpcomingSchedule($id)
    {




        // 1: get customer
        $customer = Customer::find($id);





        // 1.2: upcomingSubscription - adjustDelivery
        $subscription = $customer->latestSubscription();

        $this->adjustDelivery($subscription, $customer, $subscription->startDate);













    } // end function













    // ------------------------------------------------------------------
    // ------------------------------------------------------------------












    protected function adjustDelivery($subscription, $customer, $startDate)
    {





        // :: upcomingDeliveryDates
        $upcomingDeliveries = CustomerSubscriptionDelivery::where('customerSubscriptionId', $subscription->id)->where('deliveryDate', '>=', $startDate)->get();






        // :: root
        $dateCounter = 0;
        $deliveryCounter = 0;
        $deliveryTotalCounter = intval($upcomingDeliveries->count() ?? 0);
        $deliveryWeekDays = CustomerDeliveryDay::where('customerId', $customer->id)
            ->get()->pluck('weekDay')->toArray();











        // :: loop - upcomingDeliveries
        foreach ($upcomingDeliveries ?? [] as $upcomingDelivery) {






            // :: loop
            $continueSearch = true;

            while ($continueSearch) {




                // 1: getDeliveryDate - deliveryAsWeekDay
                $deliveryDate = date('Y-m-d', strtotime($startDate . "+{$dateCounter} days"));

                $deliveryAsWeekDay = date('l', strtotime($deliveryDate));






                // 1.1: increaseCounter
                $dateCounter++;






                // :: ifExists
                if (in_array($deliveryAsWeekDay, $deliveryWeekDays)) {






                    // 1.2: general
                    $upcomingDelivery->deliveryDate = $deliveryDate;





                    // 1.2.3: Save + increaseCounter
                    $deliveryCounter++;
                    $upcomingDelivery->save();








                    // ---------------------------------------------
                    // ---------------------------------------------







                    // 1.9.5: scheduleInformation



                    // :: removeSchedule
                    CustomerSubscriptionSchedule::where('customerSubscriptionDeliveryId', $upcomingDelivery->id)
                        ->where('customerSubscriptionId', $subscription->id)->delete();




                    // :: side-phase - storeSchedule - Meals
                    $this->storeSchedule($subscription, $customer, $upcomingDelivery);










                    // ---------------------------------------------
                    // ---------------------------------------------




                    // :: adjust untilDate - increaseCounter - break
                    $subscription->untilDate = $deliveryDate;
                    $continueSearch = false;




                } // end if - exists



            } // end loop - while





        } // end loop - upcomingDeliveries











        // :: updateSubscription
        $subscription->save();





    } // end function





















    // ------------------------------------------------------------------
    // ------------------------------------------------------------------












    protected function storeSchedule($subscription, $customer, $subscriptionDelivery)
    {



        // :: getCalendarSchedule
        $calendarSchedule = $subscription?->calendar?->scheduleByDate($subscriptionDelivery->deliveryDate) ?? null;








        // 1: create schedule
        $schedule = new CustomerSubscriptionSchedule();




        // 1.2: general
        $schedule->status = $subscriptionDelivery->status;
        $schedule->scheduleDate = $subscriptionDelivery->deliveryDate;





        // 1.3: calendarSchedule - subscriptionDelivery
        $schedule->menuCalendarScheduleId = $calendarSchedule?->id ?? null;
        $schedule->customerSubscriptionDeliveryId = $subscriptionDelivery->id;



        // 1.3: customer - customerSubscription
        $schedule->customerId = $customer->id;
        $schedule->planId = $subscription->planId;
        $schedule->customerSubscriptionId = $subscription->id;



        $schedule->save();










        // ---------------------------------------------
        // ---------------------------------------------







        // :: loop - mealTypes - checkQuantity
        foreach ($subscription->types ?? [] as $subscriptionType) {

            if ($subscriptionType->quantity > 0) {




                // 2: create
                $scheduleMeal = new CustomerSubscriptionScheduleMeal();


                // 2.2: general
                $scheduleMeal->cookStatus = $subscriptionDelivery->deliveryDate >= $this->getCurrentDate() ? 'Pending' : 'Packed';
                $scheduleMeal->mealTypeId = $subscriptionType->mealTypeId;





                // 2.3: subscriptionSchedule - customer - customerSubscription
                $scheduleMeal->subscriptionScheduleId = $schedule?->id ?? null;

                $scheduleMeal->customerId = $customer->id;
                $scheduleMeal->planId = $subscription->planId;
                $scheduleMeal->customerSubscriptionId = $subscription->id;





                // 2.4:  getMeal - CalendarSchedule (HELPER IN MenuCalendarTrait)
                $scheduleMeal->mealId = $calendarSchedule ? $this->getScheduleMeal($subscription, $calendarSchedule, $subscriptionType->mealTypeId) ?? null : null;







                // ---------------------------------------
                // ---------------------------------------







                // 2.5: bundleRangeType - price - size
                $planBundleRange = PlanBundleRange::where('planBundleId', $subscription?->planBundleId)
                    ->where('planRangeId', $subscription?->planRangeId)
                    ->where('isForWebsite', true)
                    ->first();





                // 2.5.1: getBundleRangeType
                $bundleRangeType = $planBundleRange?->typeByMealType($subscriptionType->mealTypeId) ?? null;




                // 2.5.2: bundleRangeType - price - size
                $scheduleMeal->sizeId = $bundleRangeType?->sizeId ?? null;
                $scheduleMeal->sizePrice = $bundleRangeType?->price ?? null;
                $scheduleMeal->sizeCalories = $bundleRangeType?->calories ?? null;

                $scheduleMeal->bundleRangeTypeId = $bundleRangeType?->id ?? null;







                $scheduleMeal->save();







            } // end if


        } // end loop





    } // end function









} // end controller
