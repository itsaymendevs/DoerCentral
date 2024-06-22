<?php

namespace App\Livewire\Subscription\Customer;

use App\Livewire\Forms\CustomerSubscriptionForm;
use App\Models\Customer;
use App\Models\Plan;
use App\Traits\HelperTrait;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Component;



#[Layout('livewire.layouts.subscription.customer')]
class CustomerSubscriptionStepOne extends Component
{


    use HelperTrait;



    // :: variables
    public $renewEmail;
    public CustomerSubscriptionForm $instance;








    public function mount()
    {


        // :: checkRenew
        if (! empty(session('renewCustomer'))) {

            $this->renewEmail = session('renewCustomer')->{'email'};

        } // end if






        // --------------------------------
        // --------------------------------






        // :: forgetSession
        Session::forget('customer');


    } // end function




    // --------------------------------------------------------------





    public function determine($id)
    {

        $this->dispatch('determineCustomer', $id);

    } // end function





    // --------------------------------------------------------------








    public function prepExistingCustomer($id)
    {



        // :: prepExistingCustomer
        $this->instance->planId = $id;




        // 1: checkCustomer
        $customer = Customer::where('email', $this->renewEmail)->first();





        // 1.2: continue
        if ($customer) {




            // 1.3: flag - getBasicInformation
            $this->instance->isExistingCustomer = true;


            $this->instance->firstName = $customer->firstName;
            $this->instance->lastName = $customer->lastName;
            $this->instance->email = $customer->email;




            // 1.4: get initStartDate
            $this->instance->initStartDate = $customer?->latestSubscription()?->untilDate ?
                date('Y-m-d', strtotime($customer?->latestSubscription()?->untilDate . ' +1 day')) : null;






            // 1.5: resetVars
            $this->instance->deliveryDays = [];




            // 1.5: makeSession - redirectStepTwo
            Session::put('customer', $this->instance);

            return $this->redirect(route('subscription.customerStepTwo', [$this->instance->planId]), navigate: true);







            // 1.2: incorrect
        } else {




            // :: makeAlert
            $this->makeAlert('info', 'Invalid Email');
            return $this->redirect(route('subscription.customerStepOne'));


        } // end if








    } // end function






    // --------------------------------------------------------------







    public function render()
    {

        // 1: dependencies
        $plans = Plan::whereHas('ranges')
            ->whereHas('bundles')
            ->whereHas('defaultCalendarRelation')
            ->get();



        // :: initTooltips
        $this->dispatch('initTooltips');



        return view('livewire.subscription.customer.customer-subscription-step-one', compact('plans'));


    } // end function





} // end class
