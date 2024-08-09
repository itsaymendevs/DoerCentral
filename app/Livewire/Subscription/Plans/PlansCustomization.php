<?php

namespace App\Livewire\Website\Plans;

use App\Livewire\Forms\SubscriptionForm;
use App\Models\Allergy;
use App\Models\Bag;
use App\Models\CityHoliday;
use App\Models\CustomerSubscriptionSetting;
use App\Models\Exclude;
use App\Models\MealType;
use App\Models\MenuCalendarScheduleMeal;
use App\Models\Plan;
use App\Models\PlanBundle;
use App\Models\PlanBundleDay;
use App\Models\PlanBundleRange;
use App\Models\PlanBundleRangePrice;
use App\Models\SubscriptionFormSetting;
use App\Models\Type;
use App\Traits\HelperTrait;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;


#[Layout('livewire.layouts.plans-customization')]
class PlansCustomization extends Component
{



    use HelperTrait;




    // :: variables
    public SubscriptionForm $instance;
    public $plan, $planBundles, $planBundleRanges, $planBundleDays;
    public $pickedPlanBundle, $pickedPlanBundleRange;

    public $requiredTypes = [];



    // :: dependencies
    public $allergyLists, $excludeLists, $sampleMeals, $minimumDeliveryDays;












    public function mount($name)
    {


        // :: checkSession
        if (session('pre-customer') && session('pre-customer')->{'isExistingCustomer'}) {

            $this->instance = session('pre-customer');

        } else {

            Session::forget('pre-customer');
            Session::forget('customer');

        } // end if








        // ------------------------------------
        // ------------------------------------








        // 1: getPlan
        $this->plan = Plan::where('nameURL', $name)->first();
        $this->instance->planId = $this->plan->id;






        // 1.2: dependencies
        $this->planBundles = PlanBundle::where('planId', $this->plan->id)->where('isForWebsite', true)->get();
        $this->allergyLists = Allergy::all();
        $this->excludeLists = Exclude::all();







        // 1.3: initStart
        $restrictionDays = CustomerSubscriptionSetting::first()?->changeCalendarRestriction ?? 0;
        $this->instance->initStartDate = date('Y-m-d', strtotime("+{$restrictionDays} days"));








        // ------------------------------------
        // ------------------------------------








        // 2: sampleMeals




        // 2.1: mealTypes
        $types = Type::whereIn('name', ['Recipe'])->get()?->pluck('id')?->toArray();
        $mealTypes = MealType::whereIn('typeId', $types)->get()?->pluck('id')?->toArray();





        // 2.2: sampleMeals
        $sampleMeals = MenuCalendarScheduleMeal::with('meal')
            ->whereNotNull('mealId')
            ->whereIn('mealTypeId', $mealTypes)
            ->where('scheduleDate', $this->getCurrentDate())
            ->take(12)->get();










    } // end function















    // --------------------------------------------------------------------









    public function changePlanBundle()
    {



        // 1.2: getBundle
        $this->pickedPlanBundle = PlanBundle::find($this->instance->planBundleId);



        foreach ($this->pickedPlanBundle->types->groupBy('typeId') as $commonType => $bundleTypes)
            $this->requiredTypes[$commonType] = $bundleTypes->sum('quantity');








        // --------------------------------------
        // --------------------------------------






        // 2: reset
        $this->instance->planDays = null;
        $this->instance->startDate = null;
        $this->instance->planRangeId = null;
        $this->instance->planBundleRangeId = null;
        $this->instance->totalPlanBundleRangePrice = 0;





        // 2.1: getRanges
        $this->planBundleRanges = $this->pickedPlanBundle?->ranges;






        // 2.2: getBundleTypes
        foreach ($this->pickedPlanBundle->types as $bundleType) {

            $this->instance->planBundleTypes[$bundleType->mealType->id] = $bundleType->quantity;

        } // end loop








    } // end function















    // --------------------------------------------------------------------









    public function changePlanBundleRange($id)
    {



        // 1: getBundleRange
        $this->instance->planBundleRangeId = $id;
        $this->pickedPlanBundleRange = PlanBundleRange::find($id);


        // 1.1: planRange
        $this->instance->planRangeId = $this->pickedPlanBundleRange->planRangeId;







        // 1.2: getPricePerDay - totalRangePrice
        $this->instance->planBundleRangePricePerDay = $this->pickedPlanBundle->rangesByPrice->where('planRangeId', $this->pickedPlanBundleRange->range->id)?->first()?->pricePerDay;



        $this->instance->totalPlanBundleRangePrice = intval($this->instance->planDays ?? 0) * $this->instance->planBundleRangePricePerDay;







        // 2: initSelect - datePicker
        $this->dispatch('initSelect');
        $this->dispatch('initDatePicker');





        // 2.1: reset
        $this->instance->planDays = null;








        // 2.2: recalculate
        $this->recalculate();



    } // end function








    // -------------------------------------------------------------







    public function recalculate()
    {





        // 1: recalculatePrice
        $this->instance->totalPlanBundleRangePrice = intval($this->instance->planDays ?? 0) * $this->instance->planBundleRangePricePerDay;





        // 1.2: discountPrice
        $bundleDiscount = PlanBundleDay::where('planBundleId', $this->instance->planBundleId)
            ->where('days', $this->instance?->planDays ?? 0)?->first()?->discount ?? 0;

        $this->instance->planBundleRangeDiscountPrice = $this->instance->totalPlanBundleRangePrice * ($bundleDiscount / 100);






        // 1.3: planPrice - totalPrice
        $this->instance->planPrice = $this->instance->totalPlanBundleRangePrice - $this->instance->planBundleRangeDiscountPrice;











    } // end function








    // --------------------------------------------------------------










    #[On('confirmStep')]
    public function continue($personalDetails)
    {


        // 1: handleParams
        $personalDetails = json_decode(json_encode($personalDetails));

        $this->instance->firstName = $personalDetails->firstName;
        $this->instance->lastName = $personalDetails->lastName;

        $this->instance->email = $personalDetails->email;
        $this->instance->emailProvider = $personalDetails->emailProvider;

        $this->instance->phone = $personalDetails->phone;
        $this->instance->phoneKey = $personalDetails->phoneKey;

        $this->instance->whatsapp = $personalDetails->whatsapp;
        $this->instance->whatsappKey = $personalDetails->whatsappKey;








        // -----------------------------------------------------
        // -----------------------------------------------------








        // 2: validation



        // 2.1: startDate
        if (empty($this->instance->startDate)) {

            $this->makeAlert('info', "Please select starting date");

            return false;

        } // end if










        // -----------------------------------------------------
        // -----------------------------------------------------





        // 3: fillData




        // 3.1: bag
        if ($this->instance->bag) {


            $bag = Bag::first();
            $this->instance->bagPrice = $bag->price;

        } else {

            $this->instance->bagPrice = 0;

        } // end if









        // 3.2: totalPrice
        $this->instance->totalPrice = $this->instance->planPrice + $this->instance->bagPrice;
        $this->instance->totalCheckoutPrice = $this->instance->planPrice + $this->instance->bagPrice;









        // ----------------------------------------------------
        // ----------------------------------------------------






        // :: continue


        // 4: makeSession
        Session::put('pre-customer', $this->instance);








        // 2.1: nextStep
        return $this->redirect(route('website.plans.checkout', [$this->plan->nameURL]));





    } // end function

















    // --------------------------------------------------------------------











    public function continueExisting()
    {




        // 1: appendMissingInformation





        // 1.2: bag
        $bag = Bag::whereIn('name', ['Cool Bag', 'Cooler Bag'])->first();


        $this->instance->bag = $bag->name;
        $this->instance->bagImageFile = $bag->imageFile;
        $this->instance->bagPrice = $bag->price;









        // 1.3: calculateTotalPrice
        $this->instance->totalPrice = $this->instance->totalBundleRangePrice + $this->instance->bagPrice;
        $this->instance->totalCheckoutPrice = $this->instance->totalBundleRangePrice + $this->instance->bagPrice;








        // ----------------------------------
        // ----------------------------------







        // :: continue




        // 2: makeSession
        Session::put('pre-customer', $this->instance);







        // :: redirectStepTwo
        return $this->redirect(route('website.plans.stepTwo', [$this->instance->planId]), navigate: false);





    } // end function











    // --------------------------------------------------------------------












    public function render()
    {




        // 1: dependencies
        $bag = Bag::first();
        $settings = SubscriptionFormSetting::first();
        $weekDays = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];




        // 1.2: plans
        $plans = Plan::where('id', '!=', $this->plan->id)->get();

        // $plans = Plan::whereHas('ranges')
        //     ->whereHas('bundles')
        //     ->whereHas('defaultCalendarRelation')
        //     ->where('isForWebsite', true)
        //     ->where('id', '!=', $this->plan->id)
        //     ->get();









        return view('livewire.website.plans.plans-customization', compact('plans', 'bag', 'settings'));




    } // end function






} // end class
