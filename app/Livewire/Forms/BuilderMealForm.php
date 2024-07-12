<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class BuilderMealForm extends Form
{


    // 1: ingredient - part
    public $type = [];






    // 1.2: general
    public $id = [], $partId = [], $cookingTypeId = [], $partType = [], $amount = [], $remarks = [], $groupToken = [], $isRemovable = [], $isDefault = [], $mealId = [], $mealSizeId = [];



    // 1.3: macros
    public $calories = [], $proteins = [], $carbs = [], $fats = [], $cost = [];



    // 1.2: forParts
    public $typeId = [];
    public $typeName = [];




} // end form
