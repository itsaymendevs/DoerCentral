<?php

namespace App\Livewire\Website;

use App\Models\Plan;
use App\Models\SubscriptionSetting;
use Livewire\Component;

class Plans extends Component
{



    public function render()
    {

        // 1: dependencies
        $path = 'livewire.website.plans-first';
        $settings = SubscriptionSetting::first();



        // 1.2: plans
        $plans = Plan::all();

        // $plans = Plan::whereHas('ranges')
        //     ->whereHas('bundles')
        //     ->whereHas('defaultCalendarRelation')
        //     ->where('isForWebsite', true)
        //     ->get();






        // 2.1: Grid
        if ($settings->template == 'Gird Slider') {

            $path = 'livewire.website.plans-first';


        } elseif ($settings->template == 'Grid Fully Slider') {

            $path = 'livewire.website.plans-second';

        } elseif ($settings->template == 'Motion Slider') {


            $path = 'livewire.website.plans-third';


        } elseif ($settings->template == 'Half Slider') {


            $path = 'livewire.website.plans-fourth';


        } elseif ($settings->template == 'Parallax Slider') {


            $path = 'livewire.website.plans-fifth';


        } elseif ($settings->template == 'Two Columns Slider') {


            $path = 'livewire.website.plans-sixth';


        } elseif ($settings->template == 'Three Columns Slider') {


            $path = 'livewire.website.plans-seventh';

        } // end if









        return view($path, compact('plans', 'settings'));


    } // end function





} // end class

