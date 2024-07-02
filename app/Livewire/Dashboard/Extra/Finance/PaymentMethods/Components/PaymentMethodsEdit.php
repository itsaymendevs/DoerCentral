<?php

namespace App\Livewire\Dashboard\Extra\Finance\PaymentMethods\Components;

use App\Livewire\Forms\PaymentMethodForm;
use App\Models\PaymentMethod;
use App\Traits\ActivityTrait;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;

class PaymentMethodsEdit extends Component
{


    use HelperTrait;
    use ActivityTrait;


    // :: variables
    public PaymentMethodForm $instance;







    #[On('editPayment')]
    public function remount($id)
    {



        // 1: get instance
        $payment = PaymentMethod::find($id);

        foreach ($payment->toArray() as $key => $value)
            $this->instance->{$key} = $value;



    } // end function








    // -----------------------------------------------------------








    public function update()
    {



        // :: rolePermission
        if (! session('globalUser')->checkPermission('Edit Actions')) {

            $this->makeAlert('info', 'Editing is not allowed for this account');

            return false;

        } // end if






        // --------------------------------------
        // --------------------------------------






        // ## log - activity ##
        $this->storeActivity('Menu', "Updated Payment Method {$this->instance->name} Details");



        // 1.2: makeRequest
        $response = $this->makeRequest('dashboard/extra/finance/payment-methods/update', $this->instance);






        // 1.3: reset - closeModal
        $this->instance->reset();

        $this->dispatch('refreshViews');
        $this->dispatch('closeModal', modal: '#edit-payment .btn--close');


        $this->makeAlert('success', $response->message);




    } // end function











    // -----------------------------------------------------------






    public function render()
    {




        // :: initTooltips
        $this->dispatch('initTooltips');



        return view('livewire.dashboard.extra.finance.payment-methods.components.payment-methods-edit');

    } // end function


} // end class
