<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Form;

class KitchenContainerForm extends Form
{



    // :: variables
    #[Rule('required', as: 'instanceError')]
    public $name, $charge;

    public $imageFile, $imageFileName;





} // end form
