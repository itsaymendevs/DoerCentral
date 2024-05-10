<?php

namespace App\Livewire\Dashboard;

use App\Livewire\Forms\CustomerSubscriptionForm;
use App\Models\Customer;
use App\Models\Plan;
use App\Traits\ActivityTrait;
use App\Traits\HelperTrait;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;
use stdClass;

class Customers extends Component
{


    use HelperTrait;
    use ActivityTrait;
    use WithPagination;



    // :: variable
    public $searchCustomer = '';
    public $searchPlan, $searchStatus;
    public $removeId;








    public function mount()
    {


        // :: resetCustomer - subscription
        Session::forget('customer');


    } // end function







    // -----------------------------------------------------------------









    public function pause($id)
    {

        // 1: dispatchId
        $this->dispatch('pauseSubscription', $id);


    } // end function







    // -----------------------------------------------------------------







    public function reNew($id)
    {



        // 1: getCustomer
        $customer = Customer::find($id);







        // 1.2: make instance
        $instance = new stdClass();
        $instance->email = $customer->email;






        // 1.3: makeSession - redirectStepOne
        Session::flash('renewCustomer', $instance);


        return $this->redirect(route('subscription.customerStepOne'), navigate: true);







    } // end function







    // -----------------------------------------------------------------







    public function remove($id)
    {


        // :: rolePermission
        if (! session('globalUser')->checkPermission('Remove Actions')) {

            $this->makeAlert('info', 'Deletion is not allowed for this account');

            return false;

        } // end if





        // --------------------------------------
        // --------------------------------------





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




            // ## log - activity ##
            $customer = Customer::find($this->removeId);

            $this->storeActivity('Customers', "Removed customer {$customer->fullName()}");





            // 1.2: makeRequest
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
            ->orWhere('lastName', 'LIKE', '%' . $this->searchCustomer . '%')
            ->orWhere('email', 'LIKE', '%' . $this->searchCustomer . '%')
            ->get();












        // 1.2.1: getIds
        $customerIds = $customersRaw->filter(function ($item) {


            // :: Filters
            $toReturn = true;



            // 1: plan
            $this->searchPlan ? $item?->currentSubscription()?->planId != $this->searchPlan ? $toReturn = false : null : null;



            // 2: Active / Expired
            if ($this->searchStatus && $this->searchStatus == 'Active') {


                $item?->currentSubscription()?->untilDate < $this->getCurrentDate() ? $toReturn = false : null;


            } elseif ($this->searchStatus && $this->searchStatus == 'Expired') {


                $item?->currentSubscription()?->untilDate >= $this->getCurrentDate() ? $toReturn = false : null;


            } // end if



            return $toReturn;

        })?->pluck('id')?->toArray() ?? [];







        // 1.2.2: getCustomers
        $customers = Customer::whereHas('subscriptions')->whereIn('id', $customerIds)
            ->orderBy('created_at', 'desc')->paginate(20);







        // :: initTooltips
        $this->dispatch('initTooltips');



        return view('livewire.dashboard.customers', compact('plans', 'customers', 'totalCustomers'));



    } // end function








} // end class





