<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class CustomerSubscriptionExtendForm extends Form
{


    // :: variables
    #[Validate('required')]
    public $fromDate, $untilDate, $reason, $customerId, $customerSubscriptionId;



    public $remarks, $pricePerDay, $totalPrice, $extendDays, $imageFile;


    // :: helper
    public $imageFileName;




} // end form
