<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Form;

class MealItemDetailForm extends Form
{

    // :: variables
    #[Rule('required', as: 'instanceError')]
    public $id, $type, $itemId, $mealId, $amount, $itemType;



    public $remarks, $calories, $proteins, $carbs, $fats, $grams, $isRemovable;

} // end form
