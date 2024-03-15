<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Form;

class PlanBundleRangeTypeForm extends Form
{

    // :: variables
    #[Rule('required', as: 'instanceError')]
    public $id, $mealTypeId, $planBundleRangeId, $price, $calories;


    public $sizeId;




    // :: helper
    public $mealTypeName;

} // end form

