<?php

namespace App\Livewire\Website\Components\Colors;

use App\Models\Profile;
use App\Models\SubscriptionFormSetting;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('livewire.layouts.plans-customization')]
class ColorsPlansCustomization extends Component
{



    public function render()
    {


        // 1: dependencies
        $profile = Profile::first();
        $settings = SubscriptionFormSetting::first();



        return view('livewire.website.components.colors.colors-plans-customization', compact('settings', 'profile'));


    } // end function





} // end class
