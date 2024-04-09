<?php

namespace App\Livewire\Dashboard\Customers\Manage;

use App\Models\Customer;
use App\Models\CustomerSubscriptionDelivery;
use App\Models\Plan;
use App\Traits\HelperTrait;
use Livewire\Component;
use Livewire\WithPagination;

class SingleCustomerDeliveries extends Component
{



    use HelperTrait;
    use WithPagination;




    // :: variables
    public $customer;
    public $searchPlan, $searchFromDate, $searchUntilDate, $searchStatus = '';








    public function mount($id)
    {


        // :: getCustomer
        $this->customer = Customer::find($id);


    } // end function












    // -----------------------------------------------------------










    public function render()
    {


        // 1: dependencies
        $plans = Plan::all();
        $statuses = ['Pending', 'Paused', 'Skipped', 'Canceled', 'Completed'];


        // dd(CustomerSubscriptionDelivery::where('customerId', $this->customer->id)->get());

        // 1.2: deliveriesWithFilter
        if ($this->searchPlan)
            $deliveries = CustomerSubscriptionDelivery::where('customerId', $this->customer->id)
                ->where('planId', $this->searchPlan)
                ->where('deliveryDate', '>=', $this->searchFromDate ?? '2000-01-01')
                ->where('deliveryDate', '<=', $this->searchUntilDate ?? '3000-01-01')
                ->where('status', 'LIKE', '%' . $this->searchStatus . '%')
                ->paginate(20);
        else
            $deliveries = CustomerSubscriptionDelivery::where('customerId', $this->customer->id)
                ->where('deliveryDate', '>=', $this->searchFromDate ?? '2000-01-01')
                ->where('deliveryDate', '<=', $this->searchUntilDate ?? '3000-01-01')
                ->where('status', 'LIKE', '%' . $this->searchStatus . '%')
                ->paginate(20);






        // :: initTooltips
        $this->dispatch('initTooltips');



        return view('livewire.dashboard.customers.manage.single-customer-deliveries', compact('deliveries', 'plans', 'statuses'));


    } // end function




} // end class
