<?php

namespace App\Livewire\Subscription\Customer;

use App\Livewire\Forms\CustomerSubscriptionForm;
use App\Models\Plan;
use App\Traits\HelperTrait;
use Livewire\Attributes\Layout;
use Livewire\Component;


#[Layout('livewire.layouts.subscription.customer')]
class CustomerSubscriptionStepSix extends Component
{


    use HelperTrait;




    // :: variables
    public CustomerSubscriptionForm $instance;

    public $plan;










    public function mount($id)
    {



        // :: checkSession
        session('customer') && session('customer')->{'deliveryDays'} ?
            $this->instance = session('customer') :
            $this->redirect(route('subscription.customerStepOne'), navigate: true);




        // 1: get instance
        $this->plan = Plan::find($id);



    } // end function
















    // --------------------------------------------------------------















    public function render()
    {


        // :: initTooltips
        $this->dispatch('initTooltips');



        return view('livewire.subscription.customer.customer-subscription-step-six');


    } // end function




} // end class
