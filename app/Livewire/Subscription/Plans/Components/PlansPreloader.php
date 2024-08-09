<?php

namespace App\Livewire\Website\Plans\Components;

use App\Models\Profile;
use Livewire\Component;

class PlansPreloader extends Component
{


    public function render()
    {

        // 1: dependencies
        $profile = Profile::first();




        return view('livewire.website.plans.components.plans-preloader', compact('profile'));


    } // end function


} // end class
