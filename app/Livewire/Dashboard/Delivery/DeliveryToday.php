<?php

namespace App\Livewire\Dashboard\Delivery;

use App\Models\CustomerSubscriptionDelivery;
use App\Models\Plan;
use App\Traits\HelperTrait;
use Livewire\Component;
use Livewire\WithPagination;

class DeliveryToday extends Component
{



    use HelperTrait;
    use WithPagination;



    // :: variables
    public $searchPlan, $searchFromDate, $searchUntilDate, $searchStatus = '', $searchCustomer = '';






    public function render()
    {


        // 1: dependencies
        $plans = Plan::all();
        $statuses = ['Pending', 'Picked', 'Canceled', 'Completed'];




        // 1.2: fixFilters
        $this->searchFromDate == '' ? $this->searchFromDate = null : null;
        $this->searchUntilDate == '' ? $this->searchUntilDate = null : null;









        // ----------------------------------------------
        // ----------------------------------------------











        // 1.3: getDeliveries


        // :: withPlan
        if ($this->searchPlan) {



            $deliveries = CustomerSubscriptionDelivery::whereIn('status', $statuses)
                ->where('deliveryDate', '>=', $this->searchFromDate ?? $this->getCurrentDate())
                ->where('deliveryDate', '<=', $this->searchUntilDate ?? $this->getCurrentDate())
                ->where('status', 'LIKE', '%' . $this->searchStatus . '%')
                ->where('planId', $this->searchPlan)
                ->orderBy('deliveryDate')
                ->orderBy('status')
                ->paginate(env('PAGINATE_XXL'));




            // :: noPlan
        } else {



            $deliveries = CustomerSubscriptionDelivery::whereIn('status', $statuses)
                ->where('deliveryDate', '>=', $this->searchFromDate ?? $this->getCurrentDate())
                ->where('deliveryDate', '<=', $this->searchUntilDate ?? $this->getCurrentDate())
                ->where('status', 'LIKE', '%' . $this->searchStatus . '%')
                ->orderBy('deliveryDate')
                ->orderBy('status')
                ->paginate(env('PAGINATE_XXL'));


        } // end if










        // :: initTooltips
        $this->dispatch('initTooltips');




        return view('livewire.dashboard.delivery.delivery-today', compact('deliveries', 'plans', 'statuses'));


    } // end function







} // end class
