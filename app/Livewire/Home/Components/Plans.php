<?php

namespace App\Livewire\Home\Components;

use App\Models\Bundle;
use App\Models\FeatureModule;
use App\Models\Plan;
use Livewire\Attributes\On;
use Livewire\Component;

class Plans extends Component
{



    // :: variables
    public $showSummary, $modulesPrice = [], $modulesTotalPrice;




    public function render()
    {


        // 1: plans
        $plans = Plan::all();
        $bundles = Bundle::all();
        $modules = FeatureModule::whereHas('features')?->get();


        return view('livewire.home.components.plans', compact('plans', 'bundles', 'modules'));


    } // end function








    // --------------------------------------------------------------------







    #[On('calculateTotalPrice')]
    public function calculateTotalPrice($modulesPrice)
    {


        // 1: getTotalPrice
        $this->modulesPrice[$modulesPrice['featureModuleId']] = $modulesPrice['price'];

        $this->modulesTotalPrice = array_sum($this->modulesPrice ?? []) ?? 0;


    } // end function








    // --------------------------------------------------------------------








    public function toggleSummary($status) : void
    {

        // 1: toggle
        $this->showSummary = boolval($status);

    } // end function





} // end class
