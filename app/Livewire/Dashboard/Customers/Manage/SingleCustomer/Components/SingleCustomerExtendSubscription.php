<?php

namespace App\Livewire\Dashboard\Customers\Manage\SingleCustomer\Components;

use App\Livewire\Forms\CustomerSubscriptionExtendForm;
use App\Models\Customer;
use App\Models\CustomerSubscription;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;

class SingleCustomerExtendSubscription extends Component
{


    use HelperTrait;
    use WithFileUploads;




    // :: variables
    public CustomerSubscriptionExtendForm $instance;
    public $subscription;







    public function mount($id)
    {


        // :: getLatestSubscription
        $this->subscription = CustomerSubscription::find($id);



    } // end function







    // -----------------------------------------------------------







    public function store()
    {



        // 1: makeRequest
        $response = $this->makeRequest('dashboard/customers/subscription/extend', $this->instance);



    } // end function







    // -----------------------------------------------------------









    public function render()
    {


        // 1: dependencies
        $reasons = ['Free', 'COD', 'Bank Transfer', 'Other'];





        // :: initTooltips
        $this->dispatch('initTooltips');



        return view('livewire.dashboard.customers.manage.single-customer.components.single-customer-extend-subscription', compact('reasons'));


    } // end function




} // end class
