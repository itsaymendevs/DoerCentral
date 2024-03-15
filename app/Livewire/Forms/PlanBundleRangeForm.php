<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Form;

class PlanBundleRangeForm extends Form
{

    // :: variables
    #[Rule('required', as: 'instanceError')]
    public $id, $isForWebsite, $planRangeId, $planBundleId;




    // :: helpers
    public $totalCalories, $totalPrice;


} // end form
