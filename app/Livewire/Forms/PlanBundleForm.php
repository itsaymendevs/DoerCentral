<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Form;

class PlanBundleForm extends Form
{


    // :: variables
    #[Rule('required', as: 'instanceError')]
    public $name, $planId;


    #[Rule('required', as: 'instanceError')]
    public $mealTypes = [];


    public $id, $remarks, $imageFile;


    // :: helper
    public $imageFileName;




} // end form
