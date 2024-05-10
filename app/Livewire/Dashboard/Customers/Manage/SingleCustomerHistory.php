<?php

namespace App\Livewire\Dashboard\Customers\Manage;

use App\Models\Customer;
use App\Models\CustomerSubscription;
use App\Traits\HelperTrait;
use Livewire\Component;
use Livewire\WithPagination;

class SingleCustomerHistory extends Component
{




    use HelperTrait;
    use WithPagination;




    // :: variables
    public $customer;








    public function mount($id)
    {


        // :: getCustomer
        $this->customer = Customer::find($id);


    } // end function












    // -----------------------------------------------------------










    public function render()
    {



        // 1: dependencies
        $invoices = CustomerSubscription::where('customerId', $this->customer->id)
            ->orderBy('created_at', 'desc')->paginate(env('PAGINATE'));







        // :: initTooltips
        $this->dispatch('initTooltips');



        return view('livewire.dashboard.customers.manage.single-customer-history', compact('invoices'));


    } // end function




} // end class
