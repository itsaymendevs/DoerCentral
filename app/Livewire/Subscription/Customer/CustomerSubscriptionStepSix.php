<?php

namespace App\Livewire\Subscription\Customer;

use App\Livewire\Forms\CustomerSubscriptionForm;
use App\Models\Customer;
use App\Models\Plan;
use App\Traits\HelperTrait;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Component;


#[Layout('livewire.layouts.subscription.customer')]
class CustomerSubscriptionStepSix extends Component
{


    use HelperTrait;




    // :: variables
    public CustomerSubscriptionForm $instance;

    public $plan, $customer, $subscription;










    public function mount($id)
    {






        // :: checkSession
        if (session('customer') && session('customer')->{'deliveryDays'})
            $this->instance = session('customer');
        else
            return $this->redirect(route('subscription.customerStepOne'), navigate: true);









        // :: migrateSession
        Session::forget('customer');
        Session::put('customerInvoice', $this->instance);




        // --------------------------------------
        // --------------------------------------





        // 1: get instance
        $this->plan = Plan::find($id);
        $this->customer = Customer::where('email', session('customerInvoice')->{'email'})->first();
        $this->subscription = $this->customer->latestSubscription();





    } // end function
















    // --------------------------------------------------------------















    public function render()
    {


        // :: initTooltips
        $this->dispatch('initTooltips');



        return view('livewire.subscription.customer.customer-subscription-step-six');


    } // end function




} // end class
