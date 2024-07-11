<?php

namespace App\Http\Controllers\Api;

use App\Events\CustomerSubscriptionEvent;
use App\Http\Controllers\Controller;
use App\Models\Bag;
use App\Models\Customer;
use App\Models\CustomerAddress;
use App\Models\CustomerAllergy;
use App\Models\CustomerDeliveryDay;
use App\Models\CustomerExclude;
use App\Models\CustomerSubscription;
use App\Models\CustomerSubscriptionDelivery;
use App\Models\CustomerSubscriptionSchedule;
use App\Models\CustomerSubscriptionScheduleMeal;
use App\Models\CustomerSubscriptionType;
use App\Models\CustomerWallet;
use App\Models\CustomerWalletDeposit;
use App\Models\Driver;
use App\Models\DriverZone;
use App\Models\MealType;
use App\Models\Notification;
use App\Models\Plan;
use App\Models\PlanBundleRange;
use App\Models\PromoCode;
use App\Models\ShiftType;
use App\Models\ZoneDistrict;
use App\Traits\HelperTrait;
use App\Traits\MenuCalendarTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;



class ExistingCustomerSubscriptionController extends Controller
{




    use HelperTrait;
    use MenuCalendarTrait;






    public function storeExistingCustomer(Request $request)
    {




        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;




        // :: createCustomer
        $customer = Customer::where('email', $request->email)->latest()->first();

        $customer->reToken = null;
        $customer->save();






        // ------------------------------
        // ------------------------------





        // 1: phase - storeSubscription
        $subscription = $this->storeSubscription($customer, $request);






        // 5: phase - storeTypes - mealTypes
        $this->storeTypes($subscription, $customer, $request);








        // final: phase - notification
        $this->storeNotification($subscription);








        return response()->json(['message' => 'Thanks for your subscription, enjoy your meals!'], 200);




    } // end function




























    // --------------------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------------------













    public function storeSubscription($customer, $request)
    {


        // :: dependencies
        $latestSubscription = $customer->latestSubscription();






        // ---------------------------------
        // ---------------------------------









        // 1: create
        $subscription = new CustomerSubscription();



        // 1.2: general
        $subscription->startDate = $request->startDate;
        $subscription->planDays = intval($request->planDays);







        // 1.2.2: planDeliveryDays



        // :: convertToArray
        $deliveryDaysInArray = [];


        if (! is_array($request?->deliveryDays)) {

            $deliveryDaysInArray = (array) $request->deliveryDays;

        } // end if









        // A: planDeliveryDays
        if (count($deliveryDaysInArray ?? []) > 0) {




            // :: loop - deliveryDays
            foreach ($deliveryDaysInArray ?? [] as $weekDay => $isChecked) {

                boolval($isChecked) ?
                    $subscription->planDeliveryDays = ($subscription->planDeliveryDays ?? '') . $weekDay . '_'
                    : null;


            } // end loop



            // :: removeLastComma
            $subscription->planDeliveryDays = rtrim($subscription->planDeliveryDays, '_');









            // B: migrate
        } else {


            $subscription->planDeliveryDays = $latestSubscription->planDeliveryDays;


        } // end if












        // 1.3: planInformation
        $subscription->planId = $request->planId;
        $subscription->planBundleId = $request->planBundleId;
        $subscription->planRangeId = $request->bundleRangeId; // :: rangeId / planRangeId





        // 1.3.5: planCalendar
        $subscription->menuCalendarId = Plan::find($request->planId)->defaultCalendar()?->menuCalendarId ?? null;








        // 1.4: bagInformation
        $bag = Bag::whereIn('name', ['Cool Bag', 'Cooler Bag'])->first();


        $subscription->bagId = $bag->id;
        $subscription->bagPrice = $bag->price;









        // 1.5: promoCodeInformation


        // :: exists
        if ($request->promoCodeDiscountPrice) {


            // :: getPromoCode
            $promoCode = PromoCode::where('code', $request->promoCode)->first();


            $subscription->promoCode = $promoCode->code;
            $subscription->promoCodeDiscountPrice = $request->promoCodeDiscountPrice;
            $subscription->promoCodeId = $promoCode->id;


        } // end if











        // 1.5.5: walletDiscount


        // :: exists
        if ($request?->walletDiscountPrice) {



            // A: getDiscount
            $subscription->walletDiscountPrice = $request->walletDiscountPrice ?? 0;




            // -----------------------------------
            // -----------------------------------






            // 1.5.6: create
            $deposit = new CustomerWalletDeposit();


            // 1: general
            $deposit->amount = doubleval(($request?->walletDiscountPrice ?? 0) * -1);
            $deposit->remarks = 'Renew Subscription';
            $deposit->depositDate = $this->getCurrentDate();




            // 1.2: customer - wallet
            $deposit->walletId = $customer->wallet->id;
            $deposit->customerId = $customer->id;


            $deposit->save();







            // 2: updateBalance
            $wallet = CustomerWallet::find($customer->wallet->id);

            $wallet->balance = $wallet->balance - doubleval($request->walletDiscountPrice ?? 0);
            $wallet->save();




        } // end if








        // 1.6: CheckoutPrices
        $subscription->planPrice = round(doubleval($request->totalBundleRangePrice), 2);
        $subscription->totalPrice = round(doubleval($request->totalPrice), 2);
        $subscription->totalCheckoutPrice = round(doubleval($request->totalCheckoutPrice), 2);












        // -------------------------------------
        // -------------------------------------









        // 1.7 : paymentInformation
        $subscription->paymentURL = $request?->paymentURL ?? null;
        $subscription->isPaymentDone = boolval($request?->isPaymentDone);
        $subscription->paymentMethodId = $request?->paymentMethodId ?? null;
        $subscription->paymentReference = $request?->paymentReference ?? null;





        // 1.8: customer
        $subscription->customerId = $customer->id;


        $subscription->save();










        // -------------------------------------
        // -------------------------------------







        // 1.9: deliveryInformation



        // :: side-phase - storeDelivery
        $this->storeDelivery($subscription, $customer, $request);








        // :: return
        return $subscription;


    } // end function













    // --------------------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------------------











    public function storeDelivery($subscription, $customer, $request)
    {



        // :: root
        $dateCounter = 0;
        $deliveryCounter = 0;
        $deliveryTotalCounter = intval($request->planDays);
        $deliveryWeekDays = CustomerDeliveryDay::where('customerId', $customer->id)
            ->get()->pluck('weekDay')->toArray();







        // :: loop
        while (true) {




            // 1: getDeliveryDate - deliveryAsWeekDay
            $deliveryDate = date('Y-m-d', strtotime($subscription->startDate . "+{$dateCounter} days"));

            $deliveryAsWeekDay = date('l', strtotime($deliveryDate));






            // :: ifExists
            if (in_array($deliveryAsWeekDay, $deliveryWeekDays)) {




                // 1.2: create
                $subscriptionDelivery = new CustomerSubscriptionDelivery();



                // 1.2.1: general
                $subscriptionDelivery->deliveryDate = $deliveryDate;


                // 1.2.2: status - bagCollected - remarks
                $subscriptionDelivery->status = $deliveryDate >= $this->getCurrentDate() ? 'Pending' : 'Completed';
                $subscriptionDelivery->isBagCollected = $deliveryDate >= $this->getCurrentDate() ? false : true;
                $subscriptionDelivery->remarks = $deliveryDate >= $this->getCurrentDate() ? null : 'Customer was migrated';





                // 1.2.2: customer - customerSubscription
                $subscriptionDelivery->customerId = $customer->id;
                $subscriptionDelivery->planId = $subscription->planId;
                $subscriptionDelivery->customerSubscriptionId = $subscription->id;




                // 1.2.3: Save + increaseCounter - checkIfDone
                $deliveryCounter++;
                $subscriptionDelivery->save();








                // ---------------------------------------------
                // ---------------------------------------------







                // 1.9.5: scheduleInformation



                // :: side-phase - storeSchedule - Meals
                $this->storeSchedule($subscription, $customer, $request, $subscriptionDelivery);








                // ---------------------------------------------
                // ---------------------------------------------






                // 1.9.6: driver



                // :: side-phase - storeDriver
                $this->storeDriver($subscription, $customer, $request, $subscriptionDelivery);














                // ---------------------------------------------
                // ---------------------------------------------





                // :: checkIfDone - save untilDate
                if ($deliveryCounter == $deliveryTotalCounter) {


                    $subscription->untilDate = $deliveryDate;
                    $subscription->save();

                    break;

                } // end if




            } // end if







            // :: increaseCounter
            $dateCounter++;



        } // end loop






    } // end function












    // --------------------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------------------













    public function storeSchedule($subscription, $customer, $request, $subscriptionDelivery)
    {



        // :: getCalendarSchedule
        $calendarSchedule = $subscription?->calendar?->scheduleByDate($subscriptionDelivery->deliveryDate) ?? null;








        // 1: create schedule
        $schedule = new CustomerSubscriptionSchedule();




        // 1.2: general
        $schedule->status = $subscriptionDelivery->deliveryDate >= $this->getCurrentDate() ? 'Pending' : 'Completed';
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
        foreach ($request->bundleTypes ?? [] as $mealTypeId => $quantity) {

            if ($quantity > 0) {




                // 2: create
                $scheduleMeal = new CustomerSubscriptionScheduleMeal();


                // 2.2: general
                $scheduleMeal->cookStatus = $subscriptionDelivery->deliveryDate >= $this->getCurrentDate() ? 'Pending' : 'Packed';
                $scheduleMeal->mealTypeId = $mealTypeId;





                // 2.3: subscriptionSchedule - customer - customerSubscription
                $scheduleMeal->subscriptionScheduleId = $schedule?->id ?? null;

                $scheduleMeal->customerId = $customer->id;
                $scheduleMeal->planId = $subscription->planId;
                $scheduleMeal->customerSubscriptionId = $subscription->id;





                // 2.4:  getMeal - CalendarSchedule (HELPER IN MenuCalendarTrait)
                $scheduleMeal->mealId = $calendarSchedule ? $this->getScheduleMeal($subscription, $calendarSchedule, $mealTypeId) ?? null : null;







                // ---------------------------------------
                // ---------------------------------------







                // 2.5: bundleRangeType - price - size
                $planBundleRange = PlanBundleRange::where('planBundleId', $subscription?->planBundleId)
                    ->where('planRangeId', $subscription?->planRangeId)
                    ->where('isForWebsite', true)
                    ->first();





                // 2.5.1: getBundleRangeType
                $bundleRangeType = $planBundleRange?->typeByMealType($mealTypeId) ?? null;




                // 2.5.2: bundleRangeType - price - size
                $scheduleMeal->sizeId = $bundleRangeType?->sizeId ?? null;
                $scheduleMeal->sizePrice = $bundleRangeType?->price ?? null;
                $scheduleMeal->sizeCalories = $bundleRangeType?->calories ?? null;

                $scheduleMeal->bundleRangeTypeId = $bundleRangeType?->id ?? null;







                $scheduleMeal->save();







            } // end if


        } // end loop





    } // end function




















    // --------------------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------------------













    public function storeDriver($subscription, $customer, $request, $subscriptionDelivery)
    {



        // 1: getAddress
        $customerAddress = $customer?->addressByDay($subscriptionDelivery->deliveryDate);






        // :: exists
        if ($customerAddress && $customerAddress?->deliveryTime) {



            // 1.2: getShift
            $shiftType = ShiftType::where('shiftFrom', '<=', $customerAddress?->deliveryTime?->deliveryFrom)->where('shiftUntil', '>=', $customerAddress?->deliveryTime?->deliveryUntil)?->first();







            // -------------------------------
            // -------------------------------






            // 1.3: getZones - potentialDrivers
            $zones = ZoneDistrict::where('cityDistrictId', $customerAddress?->cityDistrictId)
                    ?->get()?->pluck('zoneId')?->toArray() ?? [];


            $potentialDrivers = DriverZone::whereIn('zoneId', $zones)
                    ?->get()->pluck('driverId')?->toArray() ?? [];








            // -------------------------------
            // -------------------------------






            // :: exists
            if ($shiftType) {





                // 1.3: getDriver
                $driver = Driver::whereIn('id', $potentialDrivers)
                    ->where('shiftTypeId', $shiftType?->id)?->first();





                // :: updateDelivery
                $subscriptionDelivery->driverId = $driver?->id ?? null;
                $subscriptionDelivery->save();




            } // end if - shiftExists






        } // end if - addressExists





    } // end function




















    // --------------------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------------------











    public function storeTypes($subscription, $customer, $request)
    {



        // :: loop - bundleTypes - mealTypes
        foreach ($request->bundleTypes ?? [] as $mealTypeId => $quantity) {



            // :: checkQuantity
            if ($quantity > 0) {



                // :: getMealType
                $mealType = MealType::find($mealTypeId);





                // 1: create
                $subscriptionType = new CustomerSubscriptionType();



                // 1.2: general
                $subscriptionType->quantity = $quantity;
                $subscriptionType->mealTypeId = $mealType->id;
                $subscriptionType->typeId = $mealType->type->id;




                // 1.3: customer - customerSubscription
                $subscriptionType->customerId = $customer->id;
                $subscriptionType->customerSubscriptionId = $subscription->id;



                $subscriptionType->save();




            } // end if



        } // end loop





    } // end function















    // --------------------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------------------











    public function storeNotification($subscription)
    {



        // 1: create
        $notification = new Notification();


        // 1.2: general
        $notification->date = $this->getCurrentDate();
        $notification->title = 'Re-new Subscription';
        $notification->content = "{$subscription->customer->firstName} {$subscription->customer->lastName} has re-new subscription to {$subscription->plan->name}";




        // 1.3: route
        $notification->routeLink = "dashboard.singleCustomer";
        $notification->routePayload = $subscription->customer->id;





        // 1.4: markForDashboard
        $notification->isForDashboard = true;




        $notification->save();










        // -----------------------------------------------------
        // -----------------------------------------------------






        // 2: makePusherEvent
        event(new CustomerSubscriptionEvent($subscription->customer->fullName(), $subscription->plan->name));







    } // end function









} // end controller
