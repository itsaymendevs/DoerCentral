<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\CustomerAddress;
use App\Models\CustomerAllergy;
use App\Models\CustomerDeliveryDay;
use App\Models\CustomerExclude;
use App\Models\CustomerSubscription;
use App\Models\CustomerSubscriptionDelivery;
use App\Models\CustomerSubscriptionPause;
use App\Models\CustomerSubscriptionType;
use App\Models\CustomerWallet;
use App\Models\CustomerWalletDeposit;
use App\Models\MealType;
use App\Traits\HelperTrait;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{



    use HelperTrait;





    public function updateCustomer(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;




        // 1: get instance
        $customer = Customer::find($request->id);


        // 1.2: general
        $customer->name = $request->name;
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









        return response()->json(['message' => 'Customer has been updated'], 200);




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
            ->update([
                "status" => "Paused"
            ]);








        // 1.2.3: pricePerDay - totalPrice
        $pause->pricePerDay = $subscription->planPrice / $subscription->planDays;
        $pause->totalPrice = $pause->pricePerDay * $pause->pauseDays;







        // 1.3: customer - subscription
        $pause->customerId = $request->customerId;
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






        // 1.2: pauseDays - changeDeliveryStatus - pricePerDay - totalPrice





        // 1.2.1: pausedDays
        $pausedDays = CustomerSubscriptionDelivery::where('customerSubscriptionId', $subscription->id)
            ->where('deliveryDate', '>=', $this->getUnPauseDate())
            ->where('deliveryDate', '<=', $pause->untilDate)
            ->where('status', 'Paused')
            ->count();






        // 1.2.2: changeDeliveryStatus
        CustomerSubscriptionDelivery::where('customerSubscriptionId', $subscription->id)
            ->where('deliveryDate', '>=', $this->getUnPauseDate())
            ->where('deliveryDate', '<=', $pause->untilDate)
            ->update([
                "status" => "Pending"
            ]);





        // 1.2.3: pricePerDay - totalPrice :: ONLY LEFTOVER PAUSE DAYS
        $pricePerDay = $subscription->planPrice / $subscription->planDays;
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






        // 2: deliveryDays - removePrevious
        CustomerDeliveryDay::where('customerAddressId', $customerAddress->id)->delete();


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







} // end controller
