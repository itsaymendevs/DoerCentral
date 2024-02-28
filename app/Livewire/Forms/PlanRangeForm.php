<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Form;

class PlanRangeForm extends Form
{


    // :: variables
    #[Rule('required', as: 'instanceError')]
    public $name, $caloriesRange, $desc, $planId;

    public $id, $isForWebsite;



    // :: helper
    public $planName;


} // end form
