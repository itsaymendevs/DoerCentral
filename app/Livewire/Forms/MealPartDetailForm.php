<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Form;

class MealPartDetailForm extends Form
{

    // :: variables
    #[Rule('required', as: 'instanceError')]
    public $id, $typeId, $partId, $mealId, $amount, $partType;



    public $remarks, $calories, $proteins, $carbs, $fats, $grams, $isRemovable, $isReplacement, $groupToken, $mealSizeId;

} // end form
