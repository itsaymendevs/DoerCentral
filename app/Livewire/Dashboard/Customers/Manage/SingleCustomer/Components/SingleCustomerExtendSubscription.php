<?php

namespace App\Livewire\Dashboard\Customers\Manage\SingleCustomer\Components;

use App\Models\Customer;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;

class SingleCustomerExtendSubscription extends Component
{


    use HelperTrait;


    // :: variables
    public $id;






    public function mount($id)
    {


        // :: getCustomer
        $customer = Customer::find($id);




    } // end function







    // -----------------------------------------------------------







    public function store()
    {




        // 1: makeRequest
        // $response = $this->makeRequest('dashboard/customers/subscriptions/extend', $this->instance);





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
