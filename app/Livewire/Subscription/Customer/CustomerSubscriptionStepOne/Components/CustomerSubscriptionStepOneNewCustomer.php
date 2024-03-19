<?php

namespace App\Livewire\Subscription\Customer\CustomerSubscriptionStepOne\Components;

use App\Livewire\Forms\CustomerSubscriptionForm;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\On;
use Livewire\Component;

class CustomerSubscriptionStepOneNewCustomer extends Component
{

    public CustomerSubscriptionForm $instance;




    #[On('determineCustomer')]
    public function remount($id)
    {

        $this->instance->planId = $id;

    } // end function






    // --------------------------------------------------------------







    public function skip()
    {


        // :: redirectStepTwo
        return $this->redirect(route('subscription.customerStepTwo', [$this->instance->planId]), navigate: true);



    } // end function









    // --------------------------------------------------------------







    public function continue()
    {

        // :: validation
        if ($this->instance->gender) {



            // 1: makeSession
            Session::put('customer', $this->instance);




            // :: redirectStepTwo
            return $this->redirect(route('subscription.customerStepTwo', [$this->instance->planId]), navigate: true);


        } // end if


    } // end function











    // --------------------------------------------------------------







    public function render()
    {


        return view('livewire.subscription.customer.customer-subscription-step-one.components.customer-subscription-step-one-new-customer');


    } // end function

} // end class
