<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class MealPartDetailForm extends Form
{

   // :: variables
   #[Validate('required')]
   public $id, $typeId, $partId, $mealId, $amount, $partType;



   public $remarks, $calories, $proteins, $carbs, $fats, $grams, $isRemovable, $isReplacement, $groupToken, $mealSizeId;

} // end form
