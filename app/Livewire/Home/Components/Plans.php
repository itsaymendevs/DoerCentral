<?php

namespace App\Livewire\Home\Components;

use App\Models\Bundle;
use App\Models\Plan;
use Livewire\Component;

class Plans extends Component
{
    public function render()
    {


        // 1: plans
        $plans = Plan::all();
        $bundles = Bundle::all();


        return view('livewire.home.components.plans', compact('plans', 'bundles'));

    } // end function



} // end class
