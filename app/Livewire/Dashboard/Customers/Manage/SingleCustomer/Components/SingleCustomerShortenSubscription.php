<?php

namespace App\Livewire\Dashboard\Customers\Manage\SingleCustomer\Components;

use App\Models\Customer;
use App\Traits\HelperTrait;
use Livewire\Component;

class SingleCustomerShortenSubscription extends Component
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
        $reasons = ['Delivery Missed', 'Not Interested', 'Other'];





        // :: initTooltips
        $this->dispatch('initTooltips');



        return view('livewire.dashboard.customers.manage.single-customer.components.single-customer-shorten-subscription', compact('reasons'));


    } // end function




} // end class
