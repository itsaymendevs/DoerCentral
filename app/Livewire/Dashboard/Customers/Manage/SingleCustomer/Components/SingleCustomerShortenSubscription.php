<?php

namespace App\Livewire\Dashboard\Customers\Manage\SingleCustomer\Components;

use App\Livewire\Forms\CustomerSubscriptionShortenForm;
use App\Models\Customer;
use App\Models\CustomerSubscription;
use App\Models\CustomerSubscriptionDelivery;
use App\Traits\ActivityTrait;
use App\Traits\HelperTrait;
use Livewire\Component;
use Livewire\WithFileUploads;

class SingleCustomerShortenSubscription extends Component
{


    use HelperTrait;
    use ActivityTrait;
    use WithFileUploads;




    // :: variables
    public CustomerSubscriptionShortenForm $instance;
    public $subscription;







    public function mount($id)
    {


        // 1: getLatestSubscription
        $this->subscription = CustomerSubscription::find($id);





        // 1.2: clone instance
        $this->instance->customerId = $this->subscription->customerId;
        $this->instance->customerSubscriptionId = $this->subscription->id;





        // -------------------------------------
        // -------------------------------------




        // :: 1.3: getFromDate
        $this->instance->fromDate = $this->subscription->untilDate;







    } // end function









    // -----------------------------------------------------------










    public function store()
    {



        // :: rolePermission
        if (! session('globalUser')->checkPermission('Edit Actions')) {

            $this->makeAlert('info', 'Editing is not allowed for this account');

            return false;

        } // end if





        // --------------------------------------
        // --------------------------------------







        // :: validation
        $this->instance->validate();






        // :: check if shortenValid
        $hasPendingDays = CustomerSubscriptionDelivery::where('customerSubscriptionId', $this->instance->customerSubscriptionId)
            ->where('deliveryDate', '>=', $this->instance->untilDate)
            ->where('deliveryDate', '<=', $this->instance->fromDate)
            ->where('status', 'Pending')
            ->count();




        if ($hasPendingDays == 0) {

            // :: return - noDeliveries
            $this->makeAlert('info', 'No pending delivery has been found');
            return false;


        } // end if




        // -------------------------------
        // -------------------------------











        // 1: uploadFile
        if ($this->instance->imageFile)
            $this->instance->imageFileName = $this->uploadFile($this->instance->imageFile, 'customers/subscriptions/shortens', 'SHO');







        // ### log - activity ###
        $this->storeActivity('Customers', "Shortened subscription for {$this->subscription->customer->fullName()} to " . date('d / m / Y', strtotime($this->instance->untilDate)));




        // 1.2: makeRequest
        $response = $this->makeRequest('dashboard/customers/subscription/shorten', $this->instance);






        // :: alert - refreshPage
        $this->makeAlert('success', $response?->message);

        return $this->redirect(route('dashboard.singleCustomer', [$this->instance->customerId]), navigate: true);




    } // end function










    // -----------------------------------------------------------









    public function render()
    {


        // 1: dependencies
        $reasons = ['Delivery Missed', 'Not Interested', 'Other'];





        // :: initTooltips
        $this->dispatch('initTooltips');



        return view('livewire.dashboard.customers.manage.single-customer.components.single-customer-shorten-subscription', compact('reasons'));


    } // end function




} // end class
