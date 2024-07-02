<?php

namespace App\Livewire\Dashboard\Extra\Finance;

use App\Models\PaymentMethod;
use App\Traits\ActivityTrait;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;

class PaymentMethods extends Component
{



    use HelperTrait;
    use ActivityTrait;






    public function edit($id)
    {


        // 1: dispatchEvent
        $this->dispatch('editPayment', $id);



    } // end function







    // --------------------------------------------------------------







    public function toggleActive($id)
    {




        // :: rolePermission
        if (! session('globalUser')->checkPermission('Edit Actions')) {

            $this->makeAlert('info', 'Editing is not allowed for this account');

            return false;

        } // end if





        // --------------------------------------
        // --------------------------------------






        // ## log - activity ##
        $method = PaymentMethod::find($id);

        $this->storeActivity('Menu', "Toggled Activation for Payment {$method->name}");







        // 1: makeRequest
        $response = $this->makeRequest('dashboard/extra/finance/payment-methods/toggle', $id);
        $this->makeAlert('success', $response->message);






    } // end function














    // --------------------------------------------------------------







    public function toggleLive($id)
    {




        // :: rolePermission
        if (! session('globalUser')->checkPermission('Edit Actions')) {

            $this->makeAlert('info', 'Editing is not allowed for this account');

            return false;

        } // end if





        // --------------------------------------
        // --------------------------------------






        // ## log - activity ##
        $method = PaymentMethod::find($id);

        $this->storeActivity('Menu', "Toggled Live for Payment {$method->name}");







        // 1: makeRequest
        $response = $this->makeRequest('dashboard/extra/finance/payment-methods/toggle-live', $id);
        $this->makeAlert('success', $response->message);






    } // end function














    // ---------------------------------------------------------------------











    #[On('refreshViews')]
    public function render()
    {


        // 1: dependencies
        $paymentMethods = PaymentMethod::all();




        return view('livewire.dashboard.extra.finance.payment-methods', compact('paymentMethods'));


    } // end function






} // end class
