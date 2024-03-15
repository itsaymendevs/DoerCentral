<?php

namespace App\Livewire\Subscription;

use App\Models\Plan;
use Livewire\Attributes\Layout;
use Livewire\Component;



#[Layout('livewire.layouts.customers')]
class Customers extends Component
{

    public function render()
    {


        // 1: dependencies
        $plans = Plan::all();



        return view('livewire.subscription.customers', compact('plans'));

    } // end function

} // end class
