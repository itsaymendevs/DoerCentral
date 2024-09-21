<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class BundleForm extends Form
{

    // :: variables
    #[Validate('required')]
    public $name, $featureModuleId, $price;

    public $id, $nameURL, $desc, $imageFile, $features = [], $isDefaults = [];



    // :: helpers
    public $imageFileName;


} // end class
