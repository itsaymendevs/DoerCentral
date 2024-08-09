<?php

namespace App\Livewire\Website;

use App\Models\Plan;
use App\Models\SubscriptionSetting;
use Livewire\Component;

class PlansFifth extends Component
{



    public function render()
    {

        // 1: dependencies
        $plans = Plan::all();
        $settings = SubscriptionSetting::first();






        return view('livewire.website.plans-fifth', compact('plans', 'settings'));


    } // end function


} // end class
