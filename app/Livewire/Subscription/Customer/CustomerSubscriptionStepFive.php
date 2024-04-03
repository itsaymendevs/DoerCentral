<?php

namespace App\Livewire\Subscription\Customer;

use App\Livewire\Forms\CustomerSubscriptionForm;
use App\Livewire\Forms\StripePaymentForm;
use App\Models\CustomerSubscriptionSetting;
use App\Models\Plan;
use App\Models\PromoCode;
use App\Models\PromoCodePlan;
use App\Traits\HelperTrait;
use App\Traits\StripeTrait;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Component;


#[Layout('livewire.layouts.subscription.customer')]
class CustomerSubscriptionStepFive extends Component
{

    use HelperTrait;
    use StripeTrait;




    // :: variables
    public CustomerSubscriptionForm $instance;
    public StripePaymentForm $payment;

    public $plan, $paymentMethod, $promoCodes;
    public $isCouponApplied = false;










    public function mount($id)
    {



        // :: checkSession
        session('customer') && session('customer')->{'deliveryDays'} ?
            $this->instance = session('customer') :
            $this->redirect(route('subscription.customerStepOne'), navigate: true);




        // 1: get instance
        $this->plan = Plan::find($id);









        // 2: getPromoCodes
        $planPromoCodes = PromoCodePlan::where('planId', $this->plan->id)
            ->get()?->pluck('promoCodeId')->toArray() ?? [];



        $this->promoCodes = PromoCode::where('isForWebsite', true)
            ->where('isActive', true)
            ->whereIn('id', $planPromoCodes)
            ->whereColumn('currentUsage', '<', 'limit')
            ->get()
            ->pluck('code')
            ->toArray() ?? [];






        // 2.1: getPaymentMethod
        $this->paymentMethod = CustomerSubscriptionSetting::all()->first()?->paymentMethod ?? null;








        // 3: calculateTotalPrice
        $this->instance->totalPrice = $this->instance->totalBundleRangePrice + $this->instance->bagPrice;
        $this->instance->totalCheckoutPrice = $this->instance->totalBundleRangePrice + $this->instance->bagPrice;







    } // end function









    // --------------------------------------------------------------









    public function checkPromoCode()
    {



        // 1: checkPromoCode
        if (in_array($this->instance->promoCode, $this->promoCodes)) {




            // 1: getPromoCode
            $promoCode = PromoCode::where('code', $this->instance->promoCode)->first();




            // 1.2: byPercentage
            if ($promoCode->percentage) {


                $this->instance->promoCodeDiscountPrice = $this->instance->totalBundleRangePrice * ($promoCode->percentage / 100);


                // 1.2: byAmount
            } else {

                $this->instance->promoCodeDiscountPrice = $promoCode->cashAmount;

            } // end if








            // -------------------------------
            // -------------------------------







            // :: calculateTotalPrice
            $this->instance->totalCheckoutPrice = round(($this->instance->totalBundleRangePrice - $this->instance->promoCodeDiscountPrice) + $this->instance->bagPrice, 2);


            // :: validCoupon
            $this->isCouponApplied = true;





            // :: alert
            $this->makeAlert('success', 'Coupon Applied Successfully');




            // 1.2: invalidCoupon
        } else {







            // :: resetDiscount - totalCheckoutPrice
            $this->instance->promoCodeDiscountPrice = null;
            $this->instance->totalCheckoutPrice = $this->instance->totalPrice;



            // :: invalidCoupon
            $this->isCouponApplied = false;


        } // end if





    } // end function











    // --------------------------------------------------------------











    public function convertExpiry()
    {


        // 1: getMonth - Year
        $this->payment->cardExpiryYear = date('Y', strtotime($this->payment->cardExpiry));
        $this->payment->cardExpiryMonth = date('m', strtotime($this->payment->cardExpiry));



    } // end function









    // --------------------------------------------------------------









    public function continue()
    {




        // :: makePayment
        $this->instance->paymentMethodId = $this->paymentMethod->id ?? null;




        // 1: Stripe
        if ($this->paymentMethod->name == 'Stripe') {

            $this->instance->isPaymentDone = $this->makeStripePayment($this->payment);

        } // end if








        // :: checkPaymentDone
        if (! $this->instance->isPaymentDone) {

            $this->makeAlert('info', 'Payment Failed');

            return false;

        } // end if







        // ----------------------------------------
        // ----------------------------------------







        // :: continue



        // 2: makeSession
        Session::put('customer', $this->instance);





        // 2.1: makeRequest
        $response = $this->makeRequest('subscription/customer/store', $this->instance);



        

        // :: redirectToCheckout
        return $this->redirect(route('subscription.customerStepSix', [$this->plan->id]), navigate: true);




    } // end function











    // --------------------------------------------------------------







    public function render()
    {


        // 1: dependencies
        $expiryYears = [];

        for ($i = 0; $i <= 10; $i++)
            array_push($expiryYears, date('Y', strtotime('+' . $i . 'year')));




        // :: initTooltips
        $this->dispatch('initTooltips');



        return view('livewire.subscription.customer.customer-subscription-step-five', compact('expiryYears'));


    } // end function




} // end class

