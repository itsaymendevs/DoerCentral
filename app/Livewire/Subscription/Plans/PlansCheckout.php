<?php

namespace App\Livewire\Website\Plans;

use App\Livewire\Forms\PaymenntForm;
use App\Livewire\Forms\SubscriptionForm;
use App\Models\Bag;
use App\Models\CityDistrict;
use App\Models\CustomerSubscriptionSetting;
use App\Models\Plan;
use App\Models\PlanBundle;
use App\Models\PlanBundleRange;
use App\Models\PromoCode;
use App\Models\PromoCodePlan;
use App\Models\SubscriptionFormSetting;
use App\Traits\HelperTrait;
use App\Traits\PaymenntTrait;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('livewire.layouts.plans-customization')]
class PlansCheckout extends Component
{


    use HelperTrait;
    use PaymenntTrait;




    // :: variables
    public SubscriptionForm $instance;
    public PaymenntForm $payment;
    public $plan, $district, $paymentMethod;
    public $pickedPlanBundle, $pickedPlanBundleRange;
    public $isProcessing = false;









    public function mount($name)
    {



        // 1: getPlan
        $this->plan = Plan::where('nameURL', $name)->first();




        // 1.2: handleSession
        if (session('pre-customer')) {

            $this->instance = Session::get('pre-customer');

        } else {

            $this->redirect(route('website.plans.customization', [$this->plan->nameURL]));

        } // end if








        // ----------------------------------------------------------------
        // ----------------------------------------------------------------






        // 2: initials
        $this->instance->promoCodeDiscountPrice = 0;
        $this->instance->referralDiscountPrice = 0;



        // 2.5: dependencies
        $this->pickedPlanBundle = PlanBundle::find($this->instance->planBundleId);
        $this->pickedPlanBundleRange = PlanBundleRange::find($this->instance->planBundleRangeId);





        // 2.6: payment
        $this->paymentMethod = CustomerSubscriptionSetting::first()?->paymentMethod ?? null;
        $this->instance->paymentMethodId = $this->paymentMethod->id ?? null;








    } // end function













    // ----------------------------------------------------------------








    #[On('confirmAddress')]
    public function storeAddress($addressDetails)
    {




        // 1: handleParams
        $addressDetails = json_decode(json_encode($addressDetails));

        $this->instance->cityId = $addressDetails->cityId;
        $this->instance->cityDistrictId = $addressDetails->cityDistrictId;
        $this->instance->cityDeliveryTimeId = $addressDetails->cityDeliveryTimeId;

        $this->instance->locationAddress = $addressDetails->locationAddress;
        $this->instance->apartment = $addressDetails->apartment;
        $this->instance->floor = $addressDetails->floor;
        $this->instance->deliveryDays = (array) $addressDetails->deliveryDays ?? [];






        // -----------------------------------------------------
        // -----------------------------------------------------







        // 2: getDistrict
        $this->district = CityDistrict::find($this->instance?->cityDistrictId);







    } // end function








    // ----------------------------------------------------------------







    public function checkPromo()
    {




        // 1: getPromo
        $planPromos = PromoCodePlan::where('planId', $this->plan->id)->get()?->pluck('promoCodeId')->toArray() ?? [];


        $promo = PromoCode::where('isActive', true)
            ->whereIn('id', $planPromos)
            ->where('code', $this->instance?->promoCode)
            ->whereColumn('currentUsage', '<', 'limit')->first();






        // 1.2: getDiscount
        if ($promo) {


            if ($promo->percentage) {

                $this->instance->promoCodeDiscountPrice = $this->instance->planPrice * ($promo->percentage / 100);

            } else {

                $this->instance->promoCodeDiscountPrice = $promo->cashAmount;

            } // end if


        } else {


            $this->instance->promoCodeDiscountPrice = 0;

        } // end if








        // 1.3: recalculate
        $this->recalculate();






    } // end function











    // ----------------------------------------------------------------









    public function recalculate()
    {



        // 1 getPlanPrice
        $this->instance->planPrice = $this->instance->totalPlanBundleRangePrice - $this->instance->planBundleRangeDiscountPrice;




        // 1.2: checkPromo
        $this->instance->planPrice -= $this->instance->referralDiscountPrice;
        $this->instance->planPrice -= $this->instance->promoCodeDiscountPrice;




        // 1.3: getTotal
        $this->instance->totalPrice = $this->instance->planPrice + $this->instance->bagPrice;
        $this->instance->totalCheckoutPrice = $this->instance->planPrice + $this->instance->bagPrice;







    } // end function












    // --------------------------------------------------------------------








    public function continue()
    {



        if ($this->isProcessing == false) {



            // 1: changeProcessing - determineCustomer
            $this->isProcessing = true;
            $this->instance->isExistingCustomer ? $type = 'customer' : $type = 'lead';







            // 1.2: store
            $this->storeCustomer($type);




            // 1.3: Paymennt
            if ($this->paymentMethod->name == 'Paymennt') {

                $this->makeCheckoutPaymennt($this->instance, $this->payment, $this->paymentMethod);

            } // end if






        } // end if






    } // end function








    // ----------------------------------------------------------------





    public function storeCustomer($type = 'customer')
    {



        // 1: restructure



        // 1.2: deliveryDays
        $restructure = [];


        foreach ($this->instance?->deliveryDays ?? [] as $deliveryDay) {

            $restructure[$deliveryDay] = true;

        } // end loop


        $this->instance->deliveryDays = $restructure ?? [];








        // 1.3: date
        $this->instance->startDate = date('Y-m-d', strtotime(str_replace('/', '-', $this->instance->startDate)));









        // ----------------------------------------
        // ----------------------------------------








        // 2: storeCustomer
        Session::put('customer', $this->instance);





        // 2.1: determine
        if ($type == 'customer') {

            $response = $this->makeRequest('subscription/lead/store', $this->instance);

        } elseif ($type == 'lead') {

            $response = $this->makeRequest('subscription/lead/store', $this->instance);

        } // end if







    } // end function








    // ----------------------------------------------------------------








    public function render()
    {



        // 1: dependencies
        $mapsKey = CustomerSubscriptionSetting::first()?->mapsKey;
        $settings = SubscriptionFormSetting::first();



        return view('livewire.website.plans.plans-checkout', compact('mapsKey', 'settings'));


    } // end function









} // end class
