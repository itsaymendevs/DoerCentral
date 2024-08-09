<?php

namespace App\Livewire\Website\Plans\Components;

use App\Models\Profile;
use App\Models\Social;
use Livewire\Component;

class PlansNavbar extends Component
{
    public function render()
    {

        // 1: dependencies
        $socials = Social::first();
        $profile = Profile::first();




        return view('livewire.website.plans.components.plans-navbar', compact('socials', 'profile'));


    } // end function


} // end class
