<?php

namespace App\Livewire\Dashboard;

use App\Models\Customer;
use App\Models\Plan;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Customers extends Component
{


    use HelperTrait;
    use WithPagination;



    // :: variable
    public $searchCustomer = '';
    public $searchPlan, $searchStatus;
    public $removeId;











    public function pause($id)
    {

        // 1: dispatchId
        $this->dispatch('pauseSubscription', $id);


    } // end function







    // -----------------------------------------------------------------









    public function remove($id)
    {


        // 1: params - confirmationBox
        $this->removeId = $id;

        $this->makeAlert('remove', null, 'confirmCustomerRemove');



    } // end function







    // -----------------------------------------------------------







    #[On('confirmCustomerRemove')]
    public function confirmRemove()
    {



        // 1: remove
        if ($this->removeId) {


            $response = $this->makeRequest('dashboard/customers/remove', $this->removeId);
            $this->makeAlert('info', $response->message);



            // 1.2: renderView
            $this->render();



        } // end if





    } // end function













    // -----------------------------------------------------------












    #[On('refreshViews')]
    public function render()
    {


        // 1: dependencies
        $plans = Plan::all();
        $totalCustomers = Customer::whereHas('subscriptions')->get();








        // ---------------------------------
        // ---------------------------------






        // 1.2: customers - makeFilter
        $customersRaw = Customer::where('firstName', 'LIKE', '%' . $this->searchCustomer . '%')
            ->orWhere('lastName', 'LIKE', '%' . $this->searchCustomer . '%')->get();





        // 1.2.1: getIds
        $customerIds = $customersRaw->filter(function ($item) {


            // :: Filters
            $toReturn = true;



            // 1: plan
            $this->searchPlan ? $item->latestSubscription()->planId != $this->searchPlan ? $toReturn = false : null : null;



            // 2: Active / Expired
            if ($this->searchStatus && $this->searchStatus == 'Active') {


                $item->latestSubscription()->untilDate < $this->getCurrentDate() ? $toReturn = false : null;


            } elseif ($this->searchStatus && $this->searchStatus == 'Expired') {


                $item->latestSubscription()->untilDate >= $this->getCurrentDate() ? $toReturn = false : null;


            } // end if



            return $toReturn;

        })?->pluck('id')?->toArray() ?? [];







        // 1.2.2: getCustomers
        $customers = Customer::whereHas('subscriptions')->whereIn('id', $customerIds)->paginate(20);







        // :: initTooltips
        $this->dispatch('initTooltips');



        return view('livewire.dashboard.customers', compact('plans', 'customers', 'totalCustomers'));



    } // end function








} // end class





