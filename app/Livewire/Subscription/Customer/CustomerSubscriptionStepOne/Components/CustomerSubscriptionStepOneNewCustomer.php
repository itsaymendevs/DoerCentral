<?php

namespace App\Livewire\Subscription\Customer\CustomerSubscriptionStepOne\Components;

use App\Livewire\Forms\CustomerSubscriptionForm;
use App\Models\Customer;
use App\Traits\HelperTrait;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\On;
use Livewire\Component;

class CustomerSubscriptionStepOneNewCustomer extends Component
{


    use HelperTrait;



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



        // 1: checkEmail
        $exists = Customer::where('email', $this->instance->email)->count();

        if ($exists) {


            $this->makeAlert('info', 'Email Already Exists');
            return false;

        } // end if








        // ----------------------------------------
        // ----------------------------------------










        // 2: continue
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
