<?php

namespace App\Livewire\Dashboard\Customers\Manage\SingleCustomer\Components;

use App\Models\CustomerSubscription;
use App\Models\CustomerSubscriptionPause;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;
use stdClass;

class SingleCustomerResumeSubscription extends Component
{


    use HelperTrait;


    // :: variables
    public $subscription;
    public $removeId;






    public function mount($id)
    {


        // :: getSubscription - customer
        $this->subscription = CustomerSubscription::find($id);



    } // end function







    // -----------------------------------------------------------







    public function unPause($id)
    {



        // 1: params - confirmationBox
        $this->removeId = $id;

        $this->makeAlert('question', 'Canceling pause will deduct balance from customer wallet', 'confirmUnPause');





    } // end function










    // -----------------------------------------------------------







    #[On('confirmUnPause')]
    public function confirmUnPause()
    {



        // 1: create instance
        $instance = new stdClass();

        $instance->id = $this->removeId;
        $instance->customerSubscriptionId = $this->subscription->id;





        // 1.2: remove
        if ($this->removeId) {





            // 1.3: makeRequest
            $response = $this->makeRequest('dashboard/customers/subscription/un-pause', $instance);



            // :: refreshPage
            $this->dispatch('refreshViews');
            $this->dispatch('refreshWalletViews');

            $this->makeAlert('success', $response->message);

            $this->render();




        } // end if





    } // end function










    // -----------------------------------------------------------








    #[On('refreshPauseViews')]
    public function render()
    {



        // 1: dependencies
        $pauses = CustomerSubscriptionPause::orderBy('created_at', 'desc')
            ->where('customerSubscriptionId', $this->subscription->id)->get();




        // :: initTooltips
        $this->dispatch('initTooltips');



        return view('livewire.dashboard.customers.manage.single-customer.components.single-customer-resume-subscription', compact('pauses'));



    } // end function




} // end class



