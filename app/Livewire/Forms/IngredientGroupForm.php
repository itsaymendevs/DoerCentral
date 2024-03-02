<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Form;

class IngredientGroupForm extends Form
{

    // :: variables
    #[Rule('required', as: 'instanceError')]
    public $name, $desc;

    public $id;



} // end form
