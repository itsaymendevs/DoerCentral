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




        // 1.2: fixFilters
        $this->searchFromDate == '' ? $this->searchFromDate = null : null;
        $this->searchUntilDate == '' ? $this->searchUntilDate = null : null;







        // 1.3: deliveriesWithFilter
        if ($this->searchPlan) {


            $deliveries = CustomerSubscriptionDelivery::where('customerId', $this->customer->id)
                ->where('planId', $this->searchPlan)
                ->where('deliveryDate', '>=', $this->searchFromDate ?? $this->getCurrentDate())
                ->where('deliveryDate', '<=', $this->searchUntilDate ?? '3000-01-01')
                ->where('status', 'LIKE', '%' . $this->searchStatus . '%')
                ->paginate(env('PAGINATE_XXL'));


        } else {


            $deliveries = CustomerSubscriptionDelivery::where('customerId', $this->customer->id)
                ->where('deliveryDate', '>=', $this->searchFromDate ?? $this->getCurrentDate())
                ->where('deliveryDate', '<=', $this->searchUntilDate ?? '3000-01-01')
                ->where('status', 'LIKE', '%' . $this->searchStatus . '%')
                ->paginate(env('PAGINATE_XXL'));


        } // end if









        // :: initTooltips
        $this->dispatch('initTooltips');



        return view('livewire.dashboard.customers.manage.single-customer-deliveries', compact('deliveries', 'plans', 'statuses'));


    } // end function




} // end class
