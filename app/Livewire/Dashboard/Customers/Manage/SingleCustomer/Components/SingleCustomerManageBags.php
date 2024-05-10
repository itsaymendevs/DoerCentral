<?php

namespace App\Livewire\Dashboard\Customers\Manage\SingleCustomer\Components;

use App\Models\Customer;
use App\Models\CustomerSubscription;
use App\Traits\ActivityTrait;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;
use stdClass;

class SingleCustomerManageBags extends Component
{


    use HelperTrait;
    use ActivityTrait;



    // :: variable
    public $customer;





    public function mount($id)
    {


        // :: getCustomer
        $this->customer = Customer::find($id);



    } // end function







    // -----------------------------------------------------------







    public function store($id)
    {


        // :: rolePermission
        if (! session('globalUser')->checkPermission('Edit Actions')) {

            $this->makeAlert('info', 'Editing is not allowed for this account');

            return false;

        } // end if





        // --------------------------------------
        // --------------------------------------



        // :: make instance
        $instance = new stdClass();
        $instance->customerSubscriptionId = $id;






        // ## log - activity ##
        $this->storeActivity('Customers', "Confirmed bag-refund to {$this->customer->fullName()} wallet");





        // 1: makeRequest
        $response = $this->makeRequest('dashboard/customers/bags/refunds/store', $instance);



        // 1.2: reset - alert - refresh
        $this->dispatch('refreshBagViews');
        $this->dispatch('refreshWalletViews');

        $this->makeAlert('success', $response?->message);



    } // end function







    // -----------------------------------------------------------









    #[On('refreshBagViews')]
    public function render()
    {


        // 1: dependencies
        $subscriptions = CustomerSubscription::orderBy('created_at', 'desc')
            ->where('customerId', $this?->customer?->id)->get();





        // :: initTooltips
        $this->dispatch('initTooltips');



        return view('livewire.dashboard.customers.manage.single-customer.components.single-customer-manage-bags', compact('subscriptions'));


    } // end function




} // end class
