<?php

namespace App\Livewire\Subscription\Customer;

use App\Livewire\Forms\CustomerSubscriptionForm;
use App\Models\Plan;
use App\Models\PlanBundle;
use App\Models\PlanBundleDay;
use App\Models\Type;
use App\Traits\HelperTrait;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Component;


#[Layout('livewire.layouts.subscription.customer')]
class CustomerSubscriptionStepTwo extends Component
{


    use HelperTrait;




    // :: variables
    public CustomerSubscriptionForm $instance;
    public $requiredTypes = [];
    public $plan;







    public function mount($id)
    {


        // 1: get instance
        $this->plan = Plan::find($id);



        // :: checkSession
        session('customer') && session('customer')->{'email'} ?
            $this->instance = session('customer') :
            $this->redirect(route('subscription.customerStepOne'), navigate: true);





        // :: limitFutureSession
        $this->instance->planDays = null; // 3rd
        $this->instance->bag = null; // 4th
        $this->instance->deliveryDays = null; // 5th
        Session::put('customer', $this->instance);





    } // end function









    // --------------------------------------------------------------









    public function changeBundle($id)
    {


        // 1: planBundle
        $this->instance->planBundleId = $id;



        // 1.2: get requiredTypes
        $planBundle = PlanBundle::find($id);



        foreach ($planBundle?->types?->groupBy('typeId') as $commonType => $bundleTypes)
            $this->requiredTypes[$commonType] = $bundleTypes->sum('quantity');





        // 1.3: invoice bundleTypesInArray
        $this->instance->bundleTypesInArray = implode(' • ', $planBundle?->typesInArray());




    } // end function









    // --------------------------------------------------------------









    public function changeRange($id)
    {


        // :: bundleRange
        $this->instance->bundleRangeId = $id;



        // 1: getPlanBundle - bundleRangePricePerDay
        $planBundle = $this->plan?->bundles->where('id', $this->instance->planBundleId)->first();
        $this->instance->bundleRangePricePerDay = $planBundle?->rangesByPrice?->where('planRangeId', $id)?->first()?->pricePerDay;



        // 1.2: get totalPrice - totalCalories
        $this->instance->totalBundleRangeCalories = $this->plan?->ranges->where('id', $this->instance->bundleRangeId)->first()->caloriesRange;








        // -------------------------
        // -------------------------





        // 1.3: getDiscountRaw
        $discount = PlanBundleDay::where('planBundleId', $this->instance->planBundleId)
            ->where('days', $this->instance?->planDays ?? 0)?->first()?->discount ?? 0;



        // 1.4: calculateDiscount
        $discountPrice = ((intval($this->instance->planDays) ?? 0) * $this->instance->bundleRangePricePerDay) * ($discount / 100);





        // 1.5: totalPrice (-Discount)
        $this->instance->totalBundleRangePrice = ((intval($this->instance->planDays) ?? 0) * $this->instance->bundleRangePricePerDay) - $discountPrice;







        // ---------------------------
        // ---------------------------








        // 2: getBundleTypes
        foreach ($planBundle?->types ?? [] as $bundleType) {

            $this->instance->bundleTypes[$bundleType->mealType->id] = $bundleType->quantity;

        } // end loop




    } // end function









    // --------------------------------------------------------------








    public function changeBundleType($quantity, $mealTypeId)
    {


        // :: updateBundleTypes
        $this->instance->bundleTypes[$mealTypeId] = $quantity;


    } // end if








    // --------------------------------------------------------------









    public function updateOverview()
    {



        // 1: getDiscountRaw
        $discount = PlanBundleDay::where('planBundleId', $this->instance->planBundleId)
            ->where('days', $this->instance?->planDays ?? 0)?->first()?->discount ?? 0;



        // 1.2: calculateDiscount
        $discountPrice = ((intval($this->instance->planDays) ?? 0) * $this->instance->bundleRangePricePerDay) * ($discount / 100);






        // ---------------------------
        // ---------------------------







        // 1.3: totalPrice (-Discount)
        $this->instance->totalBundleRangePrice = ((intval($this->instance->planDays) ?? 0) * $this->instance->bundleRangePricePerDay) - $discountPrice;





        // :: mirrorSelect - planDays
        $this->dispatch('mirrorSelect', class: '.planDays--select', value: $this->instance->planDays);



    } // end function









    // --------------------------------------------------------------






    public function continue()
    {


        // 1: validate requiredTypes with bundleTypes
        $types = Type::all();

        foreach ($types as $type) {



            // :: typeExists
            if (! empty($this->requiredTypes[$type->id])) {




                // 1.2: getTypeCount
                $typeCount = 0;

                foreach ($type->mealTypes as $mealType)
                    $typeCount += $this->instance->bundleTypes[$mealType->id];





                // 1.3: compareRequiredTypes
                if ($typeCount != $this->requiredTypes[$type->id]) {

                    $this->makeAlert('info', "Please select the correct number of {$type->name} to continue");

                    return false;

                } // end if


            } // end if

        } // end loop











        // ----------------------------------------
        // ----------------------------------------






        // :: continue





        // 1: makeSession
        Session::put('customer', $this->instance);






        // 1.2: existingCustomer
        if ($this->instance->isExistingCustomer) {




            // :: redirectStepFive- existing
            return $this->redirect(route('subscription.customerStepFiveExisting', [$this->instance->planId]), navigate: true);



        } else {



            // :: redirectStepTwo - regular
            return $this->redirect(route('subscription.customerStepThree', [$this->instance->planId]), navigate: true);



        } // end if






    } // end function











    // --------------------------------------------------------------







    public function render()
    {




        // :: initTooltips
        $this->dispatch('initTooltips');



        return view('livewire.subscription.customer.customer-subscription-step-two');


    } // end function





} // end class

