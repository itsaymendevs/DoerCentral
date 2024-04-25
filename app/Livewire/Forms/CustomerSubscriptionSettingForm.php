<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class CustomerSubscriptionSettingForm extends Form
{

    // :: variables
    #[Validate('required')]
    public $minimumDeliveryDays, $isPaymentSkipped, $paymentMethodId, $pauseRestriction, $unPauseRestriction, $skipRestriction, $shortenRestriction, $changeCalendarRestriction, $mealSelectionRestriction;




} // end form
