<?php

namespace App\Livewire\CustomerPortal\CustomerGeneral\Components;

use App\Livewire\Forms\CustomerSubscriptionPauseForm;
use App\Models\CustomerSubscription;
use App\Models\CustomerSubscriptionDelivery;
use App\Models\VersionPermission;
use App\Traits\HelperTrait;
use Livewire\Component;

class CustomerGeneralPauseSubscription extends Component
{


    use HelperTrait;


    // :: variables
    public CustomerSubscriptionPauseForm $instance;
    public $subscription;







    public function mount($id)
    {


        // :: getSubscription - customer
        $this->subscription = CustomerSubscription::find($id);


        $this->instance->customerId = $this->subscription->customerId;
        $this->instance->customerSubscriptionId = $this->subscription->id;




    } // end function







    // -----------------------------------------------------------







    public function pause()
    {

        // :: validation
        $this->instance->validate();






        // 1: checkPauseDays
        $pauseDays = CustomerSubscriptionDelivery::where('customerSubscriptionId', $this->subscription->id)
            ->where('deliveryDate', '>=', $this->instance->fromDate)
            ->where('deliveryDate', '<=', $this->instance->untilDate)
            ->where('status', 'Pending')
            ->count();




        // :: valid
        if ($pauseDays > 0) {



            // 2: makeRequest
            $response = $this->makeRequest('dashboard/customers/subscription/pause', $this->instance);



            // :: resetForm
            $this->instance->reset('type', 'fromDate', 'untilDate', 'remarks');
            $this->dispatch('resetSelect');
            $this->dispatch('closeModal', modal: '#pause-subscription .btn--close');
            $this->dispatch('refreshWalletViews');
            $this->dispatch('refreshPauseViews');


            $this->makeAlert('success', $response->message);







            // :: invalid - noPendingDeliveries
        } else {




            $this->makeAlert('info', 'No pending deliveries to pause, please review the schedule');


        } // end if




    } // end function







    // -----------------------------------------------------------









    public function render()
    {



        // 1: dependencies
        $types = [];
        $versionPermission = VersionPermission::first();





        // :: permission - hasWallet
        if ($versionPermission->customerModuleHasWallet)
            $types = ['Refund Wallet'];







        // :: initTooltips
        $this->dispatch('initTooltips');



        return view('livewire.customer-portal.customer-general.components.customer-general-pause-subscription', compact('types'));



    } // end function




} // end class
