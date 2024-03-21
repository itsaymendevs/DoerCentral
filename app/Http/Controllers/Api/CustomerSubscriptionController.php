<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Bag;
use App\Models\Customer;
use App\Models\CustomerAddress;
use App\Models\CustomerAllergy;
use App\Models\CustomerDeliveryDay;
use App\Models\CustomerExclude;
use App\Models\CustomerSubscription;
use App\Models\PromoCode;
use App\Traits\HelperTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CustomerSubscriptionController extends Controller
{


    use HelperTrait;






    public function storeCustomer(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;




        // :: createCustomer
        $customer = new Customer();






        // ------------------------------
        // ------------------------------




        // 1: phase - storeGeneralInformation
        $customer = $this->storeGeneral($customer, $request);



        // 2: phase - storeAllergyAndExclude
        $this->storeAllergyAndExclude($customer, $request);




        // 3: phase - storeAddresses
        $this->storeAddresses($customer, $request);






        // 4: phase - storeSubscription
        $this->storeSubscription($customer, $request);








        return response()->json(['message' => 'Thanks for your subscription, enjoy your meals!'], 200);




    } // end function













    // --------------------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------------------









    public function storeGeneral($customer, $request)
    {



        // 1: general
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->gender = $request->gender ?? 'Male';
        $customer->phone = $request->phone ?? null;
        $customer->whatsapp = $request->whatsapp ?? null;
        $customer->password = Hash::make($request->password ?? '123456');



        $customer->save();





        return $customer;



    } // end function













    // --------------------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------------------












    public function storeAllergyAndExclude($customer, $request)
    {



        // 1: allergy
        foreach ($request->allergyLists ?? [] as $allergyList) {


            // :: create
            $customerAllergy = new CustomerAllergy();

            $customerAllergy->customerId = $customer->id;
            $customerAllergy->allergyId = $allergyList;

            $customerAllergy->save();

        } // end loop









        // 2: exclude
        foreach ($request->excludeLists ?? [] as $excludeList) {


            // :: create
            $customerExclude = new CustomerExclude();

            $customerExclude->customerId = $customer->id;
            $customerExclude->excludeId = $excludeList;

            $customerExclude->save();

        } // end loop





    } // end function













    // --------------------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------------------













    public function storeAddresses($customer, $request)
    {



        // 1: create
        $customerAddress = new CustomerAddress();



        // :: general
        $customerAddress->locationAddress = $request->locationAddress;
        $customerAddress->apartment = $request->apartment ?? null;
        $customerAddress->floor = $request->floor ?? null;




        // :: city - district - deliveryTime - customer
        $customerAddress->cityId = $request->cityId;
        $customerAddress->cityDistrictId = $request->cityDistrictId;
        $customerAddress->deliveryTimeId = $request->cityDeliveryTimeId;
        $customerAddress->customerId = $customer->id;




        $customerAddress->save();









        // -------------------------------------
        // -------------------------------------







        // 2: deliveryDays
        foreach ($request->deliveryDays ?? [] as $weekDay => $isChecked) {



            // :: ifChecked
            if (boolval($isChecked)) {



                // 2.1: create
                $customerDeliveryDay = new CustomerDeliveryDay();



                // :: general
                $customerDeliveryDay->weekDay = $weekDay;


                // :: customer - customerAddress
                $customerDeliveryDay->customerAddressId = $customerAddress->id;
                $customerDeliveryDay->customerId = $customer->id;


                $customerDeliveryDay->save();


            } // end if

        } // end loop










    } // end function













    // --------------------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------------------













    public function storeSubscription($customer, $request)
    {



        // 1: create
        $subscription = new CustomerSubscription();



        // 1.2: general
        $subscription->startDate = $request->startDate;
        $subscription->planDays = intval($request->planDays);




        // 1.3: planInformation
        $subscription->planId = $request->planId;
        $subscription->planBundleId = $request->planBundleId;
        $subscription->planRangeId = $request->bundleRangeId; // :: rangeId / planRangeId






        // 1.4: bagInformation
        $bag = Bag::where('name', $request->bag)->first();

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











        // 1.6: CheckoutPrices
        $subscription->planPrice = round(doubleval($request->totalBundleRangePrice), 2);
        $subscription->totalPrice = round(doubleval($request->totalPrice), 2);
        $subscription->totalCheckoutPrice = round(doubleval($request->totalCheckoutPrice), 2);












        // -------------------------------------
        // -------------------------------------







        // 1.8: deliveryInformation







        // -------------------------------------
        // -------------------------------------









        // 1.7 : paymentInformation
        $subscription->paymentMethodId = $request->paymentMethodId ?? null;
        $subscription->isPaymentDone = boolval($request->isPaymentDone);









        // 1.9: customer
        $subscription->customerId = $customer->id;


        $subscription->save();







        // :: return
        return $subscription;


    } // end function













    // --------------------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------------------







} // end controller
