<?php

namespace App\Livewire\Dashboard\Extra\Reports;

use App\Livewire\Dashboard\Delivery;
use App\Models\CityDistrict;
use App\Models\CustomerAddress;
use App\Models\CustomerSubscriptionDelivery;
use App\Models\Plan;
use App\Traits\HelperTrait;
use Livewire\Component;
use Livewire\WithPagination;


class ReportsDelivery extends Component
{




    use HelperTrait;
    use WithPagination;



    // :: variables
    public $searchDistrict, $searchFromDate, $searchUntilDate, $searchStatus = '', $searchCustomer = '';






    public function render()
    {

        // 1: dependencies
        $plans = Plan::all();
        $districts = CityDistrict::all();
        $statuses = ['Pending', 'Picked', 'Canceled', 'Completed'];




        // 1.2: fixFilters
        $this->searchFromDate == '' ? $this->searchFromDate = null : null;
        $this->searchUntilDate == '' ? $this->searchUntilDate = null : null;










        // 1.3: getDeliveries


        // :: withDistrict
        if ($this->searchDistrict) {




            // 1.3.2: prepDistrictFilter
            $weekDay = date('l', strtotime($this->getCurrentDate()));



            $customerAddresses = CustomerAddress::where('cityDistrictId', $this->searchDistrict)?->pluck('customerId')?->toArray() ?? [];








            $deliveries = CustomerSubscriptionDelivery::whereIn('status', $statuses)
                ->where('deliveryDate', '>=', $this->searchFromDate ?? $this->getCurrentDate())
                ->where('deliveryDate', '<=', $this->searchUntilDate ?? $this->getCurrentDate())
                ->where('status', 'LIKE', '%' . $this->searchStatus . '%')
                ->whereIn('customerId', $customerAddresses)
                ->orderBy('deliveryDate')
                ->orderBy('status')
                ->paginate(env('PAGINATE_LG'));









            // :: noDistrict
        } else {



            $deliveries = CustomerSubscriptionDelivery::whereIn('status', $statuses)
                ->where('deliveryDate', '>=', $this->searchFromDate ?? $this->getCurrentDate())
                ->where('deliveryDate', '<=', $this->searchUntilDate ?? $this->getCurrentDate())
                ->where('status', 'LIKE', '%' . $this->searchStatus . '%')
                ->orderBy('deliveryDate')
                ->orderBy('status')
                ->paginate(env('PAGINATE_LG'));


        } // end if










        // :: initTooltips
        $this->dispatch('initTooltips');




        return view('livewire.dashboard.extra.reports.reports-delivery', compact('deliveries', 'plans', 'statuses', 'districts'));


    } // end function


} // end class
