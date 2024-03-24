<?php

namespace App\Livewire\Dashboard\Customers\Manage;

use App\Models\Customer;
use App\Models\CustomerAddress;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;

class SingleCustomerAddresses extends Component
{


    use HelperTrait;


    // :: variables
    public $customer;






    public function mount($id)
    {


        // :: getCustomer
        $this->customer = Customer::find($id);


    } // end function












    // -----------------------------------------------------------










    #[On('refreshViews')]
    public function render()
    {


        // 1: dependencies
        $addresses = CustomerAddress::all();



        // :: initTooltips
        $this->dispatch('initTooltips');



        return view('livewire.dashboard.customers.manage.single-customer-addresses', compact('addresses'));


    } // end function




} // end class



