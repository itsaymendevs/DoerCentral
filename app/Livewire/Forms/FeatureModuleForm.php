<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class FeatureModuleForm extends Form
{


    // :: variables
    #[Validate('required')]
    public $name, $nameURL;

    public $id, $desc;


} // end class
