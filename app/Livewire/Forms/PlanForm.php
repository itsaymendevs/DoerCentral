<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Form;

class PlanForm extends Form
{



    // :: variables
    #[Rule('required', as: 'instanceError')]
    public $name, $startingPrice, $desc, $longDesc;

    public $id, $imageFile;




    // :: helpers
    public $imageFileName;


} // end form
