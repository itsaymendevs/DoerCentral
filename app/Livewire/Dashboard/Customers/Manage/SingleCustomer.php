<?php

namespace App\Livewire\Dashboard\Customers\Manage;

use App\Livewire\Forms\CustomerForm;
use App\Livewire\Forms\CustomerSubscriptionForm;
use App\Models\Allergy;
use App\Models\Bag;
use App\Models\Customer;
use App\Models\CustomerWallet;
use App\Models\Driver;
use App\Models\Exclude;
use App\Models\User;
use App\Traits\HelperTrait;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\On;
use Livewire\Component;
use stdClass;

class SingleCustomer extends Component
{


    use HelperTrait;


    // :: variables
    public CustomerForm $instance;
    public $customer, $latestSubscription;

    public CustomerSubscriptionForm $subscriptionInstance;







    public function mount($id)
    {




        // :: resetCustomer - subscription
        Session::forget('customer');




        // :: getCustomer - latestSubscription
        $this->customer = Customer::find($id);
        $this->latestSubscription = $this->customer->currentSubscription();




        // :: initiate
        foreach ($this->customer->toArray() as $key => $value)
            $this->instance->{$key} = $value;






        // --------------------------------------
        // --------------------------------------









        // 1: setAllergy - setExclude
        $this->dispatch('setSelect', id: '#allergy-select', value: $this->customer->allergies?->pluck('allergyId')->toArray() ?? []);


        $this->dispatch('setSelect', id: '#exclude-select', value: $this->customer->excludes?->pluck('excludeId')->toArray() ?? []);










    } // end function







    // -----------------------------------------------------------







    public function update()
    {




        // 1: makeRequest
        $response = $this->makeRequest('dashboard/customers/update', $this->instance);



        // 1.2: alert
        $this->makeAlert('success', $response?->message);


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











    // -----------------------------------------------------------










    #[On('refreshWalletViews', 'refreshViews')]
    public function render()
    {


        // 1: dependencies
        $excludes = Exclude::all();
        $allergies = Allergy::all();
        $managers = User::all();
        $drivers = Driver::all();
        $coolBag = Bag::where('name', 'Cool Bag')->first();
        $wallet = CustomerWallet::where('customerId', $this->customer->id)->first();



        // :: initTooltips
        $this->dispatch('initTooltips');



        return view('livewire.dashboard.customers.manage.single-customer', compact('excludes', 'allergies', 'managers', 'drivers', 'coolBag', 'wallet'));


    } // end function




} // end class
