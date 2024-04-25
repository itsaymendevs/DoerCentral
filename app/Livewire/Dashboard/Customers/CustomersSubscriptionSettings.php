<?php

namespace App\Livewire\Dashboard\Customers;

use App\Livewire\Forms\CustomerSubscriptionSettingForm;
use App\Models\CustomerSubscriptionSetting;
use App\Traits\HelperTrait;
use Livewire\Component;

class CustomersSubscriptionSettings extends Component
{


    use HelperTrait;


    // :: variable
    public CustomerSubscriptionSettingForm $instance;








    public function mount()
    {


        // 1: clone instance
        $settings = CustomerSubscriptionSetting::first();


        foreach ($settings->toArray() as $key => $value)
            $this->instance->{$key} = $value;



    } // end function








    // -----------------------------------------------------------










    public function update()
    {



        // :: validate
        $this->instance->validate();




        // 1: makeRequest
        $response = $this->makeRequest('dashboard/customers/settings/update', $this->instance);




        // 1.2: alert
        $this->makeAlert('success', $response?->message);



    } // end function









    // -----------------------------------------------------------








    public function render()
    {



        // :: initTooltips
        $this->dispatch('initTooltips');



        return view('livewire.dashboard.customers.customers-subscription-settings');



    } // end function








} // end class
