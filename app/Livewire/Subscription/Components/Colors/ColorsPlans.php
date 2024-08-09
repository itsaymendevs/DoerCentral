<?php

namespace App\Livewire\Website\Components\Colors;

use App\Models\Profile;
use App\Models\SubscriptionSetting;
use Livewire\Component;

class ColorsPlans extends Component
{



    public function render()
    {


        // 1: dependencies
        $profile = Profile::first();
        $settings = SubscriptionSetting::first();



        return view('livewire.website.components.colors.colors-plans', compact('settings', 'profile'));


    } // end function





} // end class
