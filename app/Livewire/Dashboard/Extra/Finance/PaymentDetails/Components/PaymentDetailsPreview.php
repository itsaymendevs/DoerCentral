<?php

namespace App\Livewire\Dashboard\Extra\Finance\PaymentDetails\Components;

use App\Models\CustomerSubscription;
use Livewire\Attributes\On;
use Livewire\Component;

class PaymentDetailsPreview extends Component
{



    // :: variables
    public $invoice;





    #[On('invoicePreview')]
    public function remount($id)
    {


        // 1: get instance
        $this->invoice = CustomerSubscription::find($id);




    } // end function











    // --------------------------------------------------------------------










    public function render()
    {

        return view('livewire.dashboard.extra.finance.payment-details.components.payment-details-preview');

    } // end function

} // end class
