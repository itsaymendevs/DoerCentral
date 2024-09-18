<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class PlanForm extends Form
{


    // :: variables
    #[Validate('required')]
    public $name, $price;

    public $id, $nameURL, $desc, $imageFile, $bundles = [];



    // :: helpers
    public $imageFileName;



} // end class


