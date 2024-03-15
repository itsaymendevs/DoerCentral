<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Form;

class SizeForm extends Form
{

    // :: variables
    #[Rule('required', as: 'instanceError')]
    public $name, $price, $calories;


    public $id;


} // end form
