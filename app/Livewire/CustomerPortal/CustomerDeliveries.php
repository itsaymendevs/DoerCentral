<?php

namespace App\Livewire\CustomerPortal;

use App\Models\Customer;
use App\Models\CustomerSubscriptionDelivery;
use App\Traits\HelperTrait;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;


#[Layout('livewire.layouts.portals.customer.dashboard')]
class CustomerDeliveries extends Component
{


    use HelperTrait;
    use WithPagination;




    // :: variables
    public $customer;
    public $searchFromDate;







    public function mount()
    {


        // :: getCustomer
        $this->customer = Customer::find(session('customerId'));


    } // end function












    // -----------------------------------------------------------










    public function render()
    {


        // 1: dependencies
        $deliveries = CustomerSubscriptionDelivery::where('customerId', $this->customer->id)
            ->where('deliveryDate', '>=', $this->searchFromDate ?? $this->getCurrentDate())
            ->paginate(20);






        // :: initTooltips
        $this->dispatch('initTooltips');



        return view('livewire.customer-portal.customer-deliveries', compact('deliveries'));


    } // end function




} // end class
