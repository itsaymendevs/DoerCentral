<?php

namespace App\Livewire\CustomerPortal;

use App\Models\Customer;
use App\Models\CustomerAddress;
use App\Traits\HelperTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;



#[Layout('livewire.layouts.portals.customer.dashboard')]
class CustomerAddresses extends Component
{


    use HelperTrait;


    // :: variables
    public $customer;






    public function mount()
    {


        // :: getCustomer
        $this->customer = Customer::find(session('customerId'));


    } // end function









    // -----------------------------------------------------------











    #[On('refreshViews')]
    public function render()
    {


        // 1: dependencies
        $addresses = CustomerAddress::where('customerId', $this->customer->id)->get();





        // :: initTooltips
        $this->dispatch('initTooltips');


        return view('livewire.customer-portal.customer-addresses', compact('addresses'));



    } // end function








} // end class
