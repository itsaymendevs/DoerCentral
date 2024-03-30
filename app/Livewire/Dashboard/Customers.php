<?php

namespace App\Livewire\Dashboard;

use App\Models\Customer;
use App\Models\Plan;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;

class Customers extends Component
{


    use HelperTrait;


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




        // 1.2: customers - makeFilter
        $customersRaw = Customer::where('name', 'LIKE', '%' . $this->searchCustomer . '%')->get();

        $customers = $customersRaw->filter(function ($item) {

            // :: applyFilters
            $toReturn = true;


            // 1: plan
            $this->searchPlan ? $item->latestSubscription()->planId != $this->searchPlan ? $toReturn = false : null : null;


            return $toReturn;

        });







        // :: initTooltips
        $this->dispatch('initTooltips');



        return view('livewire.dashboard.customers', compact('plans', 'customers'));



    } // end function








} // end class





