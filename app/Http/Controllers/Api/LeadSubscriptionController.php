<?php

namespace App\Http\Controllers\Api;

use App\Events\CustomerSubscriptionEvent;
use App\Http\Controllers\Controller;
use App\Models\Lead;
use App\Models\Notification;
use App\Traits\HelperTrait;
use App\Traits\MenuCalendarTrait;
use Illuminate\Http\Request;
use stdClass;

class LeadSubscriptionController extends Controller
{



    use HelperTrait;






    public function storeLead(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;




        // :: createLead
        $lead = new Lead();






        // ------------------------------
        // ------------------------------




        // 1: phase - storeGeneral
        $lead = $this->storeGeneral($lead, $request);




        // 2: phase - storeAllergyAndExclude
        $lead = $this->storeAllergyAndExclude($lead, $request);





        // 3: phase - storeAddresses
        $lead = $this->storeAddresses($lead, $request);






        // 4: phase - storeSubscription
        $lead = $this->storeSubscription($lead, $request);






        // 5: phase - storeTypes - mealTypes
        $lead = $this->storeTypes($lead, $request);








        // final: phase - notification
        $this->storeNotification($lead);







    } // end function













    // --------------------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------------------









    public function storeGeneral($lead, $request)
    {



        // 1: general
        $lead->firstName = $request->firstName;
        $lead->lastName = $request->lastName;

        $lead->email = $request->email;
        $lead->emailProvider = $request->emailProvider;

        $lead->gender = $request?->gender ?? 'Male';

        $lead->phone = $request->phone ?? null;
        $lead->phoneKey = $request->phoneKey ?? null;

        $lead->whatsapp = $request->whatsapp ?? null;
        $lead->whatsappKey = $request->whatsappKey ?? null;





        // 1.2: existing
        $lead->isExistingCustomer = $request->isExistingCustomer ?? false;




        $lead->save();






        // :: return
        return $lead;




    } // end function













    // --------------------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------------------












    public function storeAllergyAndExclude($lead, $request)
    {



        // 1: allergy - exclude
        $lead->allergyLists = $request->allergyLists ? implode('_', $request->allergyLists) : null;
        $lead->excludeLists = $request->excludeLists ? implode('_', $request->excludeLists) : null;


        $lead->save();




        // :: return
        return $lead;



    } // end function













    // --------------------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------------------













    public function storeAddresses($lead, $request)
    {



        // 1: store


        // :: general
        $lead->locationAddress = $request->locationAddress;
        $lead->apartment = $request->apartment ?? null;
        $lead->floor = $request->floor ?? null;




        // :: city - district - deliveryTime - customer
        $lead->cityId = $request->cityId;
        $lead->cityDistrictId = $request->cityDistrictId;
        $lead->cityDeliveryTimeId = $request->cityDeliveryTimeId;








        // -------------------------------------
        // -------------------------------------







        // 2: deliveryDays
        $lead->deliveryDays = $request->deliveryDays ? serialize($request->deliveryDays) : null;


        $lead->save();






        // :: return
        return $lead;





    } // end function













    // --------------------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------------------













    public function storeSubscription($lead, $request)
    {



        // 1: general
        $lead->startDate = $request->startDate;
        $lead->planDays = intval($request->planDays);





        // 1.3: planInformation
        $lead->planId = $request->planId;
        $lead->planBundleId = $request->planBundleId;
        $lead->planRangeId = $request->planRangeId;







        // 1.4: bagInformation
        $lead->bag = $request->bag;
        $lead->bagPrice = $request->bagPrice;









        // 1.5: promoCodeInformation
        $lead->promoCode = $request->promoCode;
        $lead->promoCodeDiscountPrice = $request->promoCodeDiscountPrice;










        // 1.6: CheckoutPrices
        $lead->totalBundleRangePrice = round(doubleval($request->totalPlanBundleRangePrice), 2);
        $lead->planPrice = round(doubleval($request->totalPlanBundleRangePrice), 2);
        $lead->totalPrice = round(doubleval($request->totalPrice), 2);
        $lead->totalCheckoutPrice = round(doubleval($request->totalCheckoutPrice), 2);












        // -------------------------------------
        // -------------------------------------









        // 1.7 : paymentInformation
        $lead->paymentMethodId = $request->paymentMethodId ?? null;
        $lead->paymentURL = $request->paymentURL ?? null;
        $lead->paymentReference = $request->paymentReference ?? null;

        $lead->isPaymentDone = boolval($request->isPaymentDone);



        $lead->save();








        // :: return
        return $lead;


    } // end function






















    // --------------------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------------------











    public function storeTypes($lead, $request)
    {




        // 1: bundleTypes
        $lead->bundleTypes = $request->planBundleTypes ? serialize($request->planBundleTypes) : null;


        $lead->save();




        // :: return
        return $lead;


    } // end function















    // --------------------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------------------











    public function storeNotification($lead)
    {





        // 1: create
        $notification = new Notification();


        // 1.2: general
        $notification->date = $this->getCurrentDate();
        $notification->title = 'New Lead';
        $notification->content = "{$lead->firstName} {$lead->lastName} has subscribed to {$lead->plan->name}";




        // 1.3: route
        $notification->routeLink = "dashboard.leads";
        $notification->routePayload = $lead->id;





        // 1.4: markForDashboard
        $notification->isForDashboard = true;




        $notification->save();










        // -----------------------------------------------------
        // -----------------------------------------------------






        // 2: makePusherEvent
        event(new CustomerSubscriptionEvent($lead->fullName(), $lead->plan->name));







    } // end function















    // --------------------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------------------









    public function convertLead(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;




        // :: createLead
        $lead = Lead::find($request->id);




        // 1: updatePayment
        $lead->isPaymentDone = true;
        $lead->save();









        // 2: restructureToCustomer
        $lead->bundleTypes = unserialize($lead->bundleTypes);
        $lead->deliveryDays = unserialize($lead->deliveryDays);
        $lead->allergyLists = $lead?->allergyLists ? explode('_', $lead->allergyLists) : null;
        $lead->excludeLists = $lead?->excludeLists ? explode('_', $lead->excludeLists) : null;





        // :: renaming
        $lead->bundleRangeId = $lead->planRangeId;










        // :: prepResponse
        $response = new stdClass();
        $response->lead = $lead;


        return response()->json($response, 200);





    } // end function















} // end controller

