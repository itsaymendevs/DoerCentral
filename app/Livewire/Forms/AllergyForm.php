<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Form;

class AllergyForm extends Form
{

    // :: variables
    #[Rule('required', as: 'instanceError')]
    public $name, $desc;

    public $id;


} // end form
