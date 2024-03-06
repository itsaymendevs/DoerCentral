<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Form;

class MealItemForm extends Form
{


    // :: variables
    #[Rule('required', as: 'instanceError')]
    public $id, $type, $itemId, $mealId;

    public $itemType;

} // end form
