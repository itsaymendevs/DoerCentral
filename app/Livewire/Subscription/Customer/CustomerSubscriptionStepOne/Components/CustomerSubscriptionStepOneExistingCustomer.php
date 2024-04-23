<?php

namespace App\Livewire\Subscription\Customer\CustomerSubscriptionStepOne\Components;

use App\Livewire\Forms\CustomerSubscriptionForm;
use App\Models\Customer;
use App\Traits\HelperTrait;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\On;
use Livewire\Component;

class CustomerSubscriptionStepOneExistingCustomer extends Component
{


    use HelperTrait;


    public CustomerSubscriptionForm $instance;






    #[On('determineCustomer')]
    public function remount($id)
    {

        $this->instance->planId = $id;

    } // end function










    // --------------------------------------------------------------







    public function continue()
    {



        // 1: checkCustomer
        $customer = Customer::where('email', $this->instance->email)->first();





        // 1.2: continue
        if ($customer && Hash::check($this->instance->password, $customer->password)) {




            // 1.3: flag - getBasicInformation
            $this->instance->isExistingCustomer = true;


            $this->instance->firstName = $customer->firstName;
            $this->instance->lastName = $customer->lastName;
            $this->instance->email = $customer->email;




            // 1.4: get initStartDate
            $this->instance->initStartDate = $customer?->latestSubscription()?->untilDate ?? null;






            // 1.5: resetVars
            $this->instance->deliveryDays = [];




            // 1.5: makeSession - redirectStepTwo
            Session::put('customer', $this->instance);

            return $this->redirect(route('subscription.customerStepTwo', [$this->instance->planId]), navigate: true);










            // 1.2: incorrect
        } else {





            // :: makeAlert
            $this->makeAlert('info', 'Invalid Email or Password');
            return false;



        } // end if





    } // end function








    // --------------------------------------------------------------







    public function render()
    {


        return view('livewire.subscription.customer.customer-subscription-step-one.components.customer-subscription-step-one-existing-customer');


    } // end function



} // end class

