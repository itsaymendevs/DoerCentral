<?php

namespace App\Livewire\Dashboard\Customers\Manage\SingleCustomer\Components;

use App\Livewire\Forms\CustomerWalletDepositForm;
use App\Models\Customer;
use App\Models\CustomerWalletDeposit;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;

class SingleCustomerManageWallet extends Component
{


    use HelperTrait;


    // :: variables
    public CustomerWalletDepositForm $instance;
    public $id;






    public function mount($id)
    {


        // :: getCustomer
        $customer = Customer::find($id);

        $this->instance->customerId = $customer->id;
        $this->instance->walletId = $customer->wallet->id;




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






        // 1: makeRequest
        $response = $this->makeRequest('dashboard/customers/wallet/deposits/store', $this->instance);



        // 1.2: reset - alert - refresh
        $this->instance->reset('amount', 'remarks');
        $this->dispatch('refreshWalletViews');

        $this->makeAlert('success', $response?->message);



    } // end function







    // -----------------------------------------------------------









    #[On('refreshWalletViews')]
    public function render()
    {


        // 1: dependencies
        $deposits = CustomerWalletDeposit::where('customerId', $this->id)->get();





        // :: initTooltips
        $this->dispatch('initTooltips');



        return view('livewire.dashboard.customers.manage.single-customer.components.single-customer-manage-wallet', compact('deposits'));


    } // end function




} // end class


