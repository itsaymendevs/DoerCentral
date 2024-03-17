<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Form;

class CustomerSubscriptionForm extends Form
{

    // :: variables
    #[Rule('required', as: 'instanceError')]
    public $phone, $email, $name, $whatsapp, $gender, $planId;

    public $id, $password;


} // end form
