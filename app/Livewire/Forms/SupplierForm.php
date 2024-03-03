<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Form;

class SupplierForm extends Form
{

    // :: variables
    #[Rule('required', as: 'instanceError')]
    public $name, $phone, $email, $address;

    public $id;



} // end form
