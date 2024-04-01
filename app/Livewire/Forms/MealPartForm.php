<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Form;

class MealPartForm extends Form
{


    // :: variables
    #[Rule('required', as: 'instanceError')]
    public $id = [], $typeId = [], $partId = [], $mealId = [];


    public $partType = [];

} // end form
