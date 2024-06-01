<?php

namespace App\Livewire\Dashboard\Customers\Manage\SingleCustomer\Components;

use App\Livewire\Forms\CustomerSubscriptionExtendForm;
use App\Models\Customer;
use App\Models\CustomerSubscription;
use App\Traits\ActivityTrait;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;

class SingleCustomerExtendSubscription extends Component
{


    use HelperTrait;
    use ActivityTrait;
    use WithFileUploads;




    // :: variables
    public CustomerSubscriptionExtendForm $instance;
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







        // 1.3: getFromDate
        $deliveryDays = $this->subscription->customer->deliveryWeekDays();




        // 1.4: initialDate
        $initialDate = $this->subscription->untilDate >= $this->getCurrentDate() ?
            $this->subscription->untilDate : $this->getCurrentDate();








        // 1.5: fromDate => nearestDeliveryDay available
        $counter = 1;




        while (true) {



            // :: 1.5.2: getNextDay
            $this->instance->fromDate = date('Y-m-d', strtotime("+{$counter} day", strtotime($initialDate)));




            // 1.5.3: checkWithDelivery
            if (in_array(date('l', strtotime($this->instance->fromDate)), $deliveryDays))
                break;
            else
                $counter++;



        } // end loop







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





        // 1: uploadFile
        if ($this->instance->imageFile)
            $this->instance->imageFileName = $this->uploadFile($this->instance->imageFile, 'customers/subscriptions/extends', 'EXT');





        // ## log - activity ##
        $this->storeActivity('Customers', "Extended subscription for {$this->subscription->customer->fullName()} for {$this->instance->extendDays} days");





        // 1.2: makeRequest
        $response = $this->makeRequest('dashboard/customers/subscription/extend', $this->instance);






        // :: alert - refreshPage
        $this->makeAlert('success', $response?->message);

        return $this->redirect(route('dashboard.singleCustomer', [$this->instance->customerId]), navigate: true);




    } // end function







    // -----------------------------------------------------------









    public function render()
    {


        // 1: dependencies
        $reasons = ['Free', 'COD', 'Bank Transfer', 'Other'];









        // :: initTooltips
        $this->dispatch('initTooltips');



        return view('livewire.dashboard.customers.manage.single-customer.components.single-customer-extend-subscription', compact('reasons'));


    } // end function




} // end class
