<?php

namespace App\Livewire\Dashboard\Extra\Finance;

use App\Models\Customer;
use App\Models\CustomerSubscription;
use App\Models\Plan;
use App\Traits\HelperTrait;
use Livewire\Component;
use Livewire\WithPagination;

class PaymentDetails extends Component
{


    use HelperTrait;
    use WithPagination;


    // :: variables
    public $searchFromDate = '', $searchUntilDate = '', $searchUser = '', $searchPlan = '';







    public function invoicePreview($id)
    {



        // 1: dependencies
        $this->dispatch('invoicePreview', $id);




    } // end function













    // ----------------------------------------------------------









    public function render()
    {


        // 1: dependencies
        $plans = Plan::all();
        $customers = Customer::where('firstName', 'LIKE', '%' . $this->searchUser . '%')
            ->orWhere('lastName', 'LIKE', '%' . $this->searchUser . '%')
            ->whereHas('subscriptions')
            ->get()?->pluck('id')?->toArray() ?? [];






        // ----------------------------------------
        // ----------------------------------------






        // :: determine searchDates [+1 only for created_at]
        $searchFromDate = $this->searchFromDate == '' ? $this->getCurrentDate() : $this->searchFromDate;
        $searchUntilDate = $this->searchUntilDate == '' ?
            '3000-01-01' : date('Y-m-d', strtotime($this->searchUntilDate . ' +1 day'));







        // :: searchPlan
        if ($this->searchPlan) {

            $invoices = CustomerSubscription::whereIn('customerId', $customers)
                ->where('planId', $this->searchPlan)
                ->where('created_at', '>=', $searchFromDate)
                ->where('created_at', '<=', $searchUntilDate)
                ->paginate(env('PAGINATE_LG'));



            $invoicesForOverview = CustomerSubscription::with('bagRefund')
                ->whereIn('customerId', $customers)
                ->where('planId', $this->searchPlan)
                ->where('created_at', '>=', $searchFromDate)
                ->where('created_at', '<=', $searchUntilDate)
                ->get();



        } else {

            $invoices = CustomerSubscription::whereIn('customerId', $customers)
                ->where('created_at', '>=', $searchFromDate)
                ->where('created_at', '<=', $searchUntilDate)
                ->paginate(env('PAGINATE_LG'));



            $invoicesForOverview = CustomerSubscription::with('bagRefund')
                ->whereIn('customerId', $customers)
                ->where('created_at', '>=', $searchFromDate)
                ->where('created_at', '<=', $searchUntilDate)
                ->get();


        } // end if







        // :: init tooltips
        $this->dispatch('initTooltips');





        return view('livewire.dashboard.extra.finance.payment-details', compact('plans', 'invoices', 'invoicesForOverview'));


    } // end function



} // end class
