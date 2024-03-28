<?php

namespace App\Livewire\Dashboard\Customers\Manage\SingleCustomer\Components;

use App\Livewire\Forms\CustomerSubscriptionPauseForm;
use App\Models\Customer;
use App\Models\CustomerSubscription;
use App\Traits\HelperTrait;
use Livewire\Component;

class SingleCustomerPauseSubscription extends Component
{


    use HelperTrait;


    // :: variables
    public CustomerSubscriptionPauseForm $instance;






    public function mount($id)
    {


        // :: getSubscription - customer
        $subscription = CustomerSubscription::find($id);


        $this->instance->customerId = $subscription->customerId;
        $this->instance->customerSubscriptionId = $subscription->id;




    } // end function







    // -----------------------------------------------------------







    public function pause()
    {

        // :: validation
        $this->instance->validate();





        // 1: makeRequest
        $response = $this->makeRequest('dashboard/customers/subscription/pause', $this->instance);





        // :: resetForm
        $this->instance->reset('type', 'fromDate', 'untilDate', 'remarks');
        $this->dispatch('closeModal', modal: '#pause-subscription .btn--close');
        $this->dispatch('refreshViews');


        $this->makeAlert('success', $response->message);






    } // end function







    // -----------------------------------------------------------









    public function render()
    {



        // 1: dependencies
        $types = ['Refund Wallet', 'Extend Subscription'];



        // :: initTooltips
        $this->dispatch('initTooltips');



        return view('livewire.dashboard.customers.manage.single-customer.components.single-customer-pause-subscription', compact('types'));



    } // end function




} // end class
