<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Form;

class CustomerSubscriptionPauseForm extends Form
{



    // :: variables
    #[Rule('required', as: 'instanceError')]
    public $fromDate, $untilDate, $type, $customerId, $customerSubscriptionId;



    public $remarks, $pricePerDay, $totalPrice, $isActive, $manualUnPauseDate, $pauseDays;



} // end form
