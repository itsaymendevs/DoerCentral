<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Form;

class MealPackingForm extends Form
{
    // :: variables
    #[Rule('required', as: 'instanceError')]
    public $name, $amount, $mealId;

    public $id, $remarks;



} // end form

