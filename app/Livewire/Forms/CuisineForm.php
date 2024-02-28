<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Form;

class CuisineForm extends Form
{


    // :: variables
    #[Rule('required', as: 'instanceError')]
    public $name;


} // end form
