<?php

namespace App\Livewire\Home\Components;

use App\Models\Bundle;
use App\Models\Feature;
use App\Models\FeatureModule;
use App\Models\Plan;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\On;
use Livewire\Component;

class Plans extends Component
{



    // :: variables
    public $showSummary, $modulePrices = [], $moduleFeatures = [], $moduleTotalPrices, $moduleTotalFeatures = [];






    public function mount()
    {


        // 1: removeSessions
        Session::forget(['Features', 'totalCheckoutPrice', 'plan']);


    } // end function







    // --------------------------------------------------------------------







    #[On('calculateTotalPrice')]
    public function calculateTotalPrice($purchasedModule)
    {



        // 1: getTotalPrice
        $this->modulePrices[$purchasedModule['featureModuleId']] = $purchasedModule['price'];
        $this->moduleFeatures[$purchasedModule['featureModuleId']] = $purchasedModule['features'];




        // 1.2: sumTotalPrice
        $this->moduleTotalPrices = array_sum($this->modulePrices ?? []) ?? 0;






        // -------------------------------------------------
        // -------------------------------------------------






        // 1.3: getFeatures
        $selectedFeatures = [];

        foreach ($this->moduleFeatures ?? [] as $key => $innerArray) {

            foreach ($innerArray ?? [] as $innerKey => $innerValue) {

                array_push($selectedFeatures, $innerValue);

            } // end loop

        } // end if



        $this->moduleTotalFeatures = Feature::whereIn('id', $selectedFeatures)?->pluck('name')?->toArray() ?? [];




    } // end function










    // --------------------------------------------------------------------









    public function confirmCustomizedPlan()
    {




        // 1: checkFeatures
        if (count($this->moduleTotalFeatures ?? []) > 0) {


            // 1.2: makeSessions
            Session::put('features', $this->moduleTotalFeatures ?? []);
            Session::put('totalCheckoutPrice', $this->moduleTotalPrices);


            return $this->redirect(route('website.subscribe'));

        } // end if






    } // end function








    // --------------------------------------------------------------------







    public function confirmPlan($id)
    {



        // 1: makeSessions
        $plan = Plan::find($id);

        Session::put('plan', $plan->id);
        Session::put('totalCheckoutPrice', $plan->price);


        return $this->redirect(route('website.subscribe'));






    } // end function








    // --------------------------------------------------------------------








    public function toggleSummary($status) : void
    {

        // 1: toggle
        $this->showSummary = boolval($status);

    } // end function









    // --------------------------------------------------------------------








    public function render()
    {


        // 1: dependencies
        $plans = Plan::all();
        $bundles = Bundle::all();
        $modules = FeatureModule::whereHas('features')?->get();


        return view('livewire.home.components.plans', compact('plans', 'bundles', 'modules'));


    } // end function







} // end class
