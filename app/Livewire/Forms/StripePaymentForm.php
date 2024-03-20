<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Form;

class StripePaymentForm extends Form
{


    // :: STEP 5 - PAYMENT STRIPE
    #[Rule('required', as: 'instanceError')]
    public $cardNumber, $cardCVV, $cardExpiry, $cardExpiryMonth, $cardExpiryYear, $cardHolder;

    public $paymentStatus, $paymentIntentId;




} // end class
