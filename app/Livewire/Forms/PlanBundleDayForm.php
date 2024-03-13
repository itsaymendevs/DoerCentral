<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Form;

class PlanBundleDayForm extends Form
{

    // :: variables
    #[Rule('required', as: 'instanceError')]
    public $planBundleId, $days, $discount;


    public $id;




} // end form




