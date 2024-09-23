<?php

namespace App\Livewire\Leads;

use App\Models\CountryCode;
use App\Traits\HelperTrait;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('livewire.layouts.leads')]
class LeadsContact extends Component
{



    use HelperTrait;









    public function mount()
    {

        // 1: reset
        Session::forget('businessName');



    } // end function











    // -------------------------------------------------------------------------








    public function render()
    {


        // 1: dependencies
        $countryCodes = CountryCode::all();

        return view('livewire.leads.leads-contact', compact('countryCodes'));


    } // end function





} // end class



