<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class FeatureForm extends Form
{


    // :: variables
    #[Validate('required')]
    public $name, $nameURL, $featureModuleId;

    public $id;



    // :: helpers
    public $featureModuleName;


} // end class
