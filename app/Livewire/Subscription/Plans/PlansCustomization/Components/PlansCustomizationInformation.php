<?php

namespace App\Livewire\Website\Plans\PlansCustomization\Components;

use App\Livewire\Forms\SubscriptionForm;
use App\Models\CountryCode;
use App\Models\Plan;
use App\Models\SubscriptionFormSetting;
use Livewire\Attributes\On;
use Livewire\Component;

class PlansCustomizationInformation extends Component
{


    // :: variables
    public SubscriptionForm $instance;
    public $plan;







    public function mount()
    {


        // 1: init
        $this->instance->phoneKey = '+971';
        $this->instance->whatsappKey = '+971';
        $this->instance->emailProvider = '@gmail.com';



    } // end function








    // ----------------------------------------------------------------









    public function continue()
    {



        // 1: dispatchEvent
        $this->dispatch('confirmStep', $this->instance);




    } // end function









    // ----------------------------------------------------------------








    public function render()
    {

        // 1: dependencies
        $providers = ['@gmail.com', '@outlook.com', '@hotmail.com', '@yahoo.com'];
        $settings = SubscriptionFormSetting::first();
        $countryCodes = CountryCode::all();





        return view('livewire.website.plans.plans-customization.components.plans-customization-information', compact('providers', 'countryCodes', 'settings'));



    } // end function







} // end class
