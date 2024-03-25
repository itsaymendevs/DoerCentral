<?php

namespace App\Livewire\Dashboard\Customers\Manage\SingleCustomer\Components;

use App\Models\Customer;
use App\Traits\HelperTrait;
use Livewire\Component;

class SingleCustomerPauseSubscription extends Component
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







    public function pause()
    {




        // 1: makeRequest
        // $response = $this->makeRequest('dashboard/customers/subscriptions/extend', $this->instance);





    } // end function







    // -----------------------------------------------------------









    public function render()
    {




        // :: initTooltips
        $this->dispatch('initTooltips');



        return view('livewire.dashboard.customers.manage.single-customer.components.single-customer-pause-subscription');


    } // end function




} // end class
