<?php

namespace App\Livewire\Forms;

use Illuminate\Validation\Rule;
use Livewire\Form;

class CustomerSubscriptionExtendForm extends Form
{


    // :: variables
    #[Rule('required', as: 'instanceError')]
    public $fromDate, $untilDate, $reason, $customerId, $customerSubscriptionId;



    public $remarks, $pricePerDay, $totalPrice, $extendDays, $imageFile;


    // :: helper
    public $imageFileName;




} // end form
