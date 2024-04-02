<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Illuminate\Validation\Rule;
use Livewire\Form;

class CustomerSubscriptionShortenForm extends Form
{

    // :: variables
    #[Rule('required', as: 'instanceError')]
    public $fromDate, $untilDate, $reason, $customerId, $customerSubscriptionId;



    public $remarks, $pricePerDay, $totalPrice, $shortenDays, $imageFile;


    // :: helper
    public $imageFileName;




} // end form

