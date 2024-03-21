<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Form;

class MenuCalendarForm extends Form
{

    // :: variables
    #[Rule('required', as: 'instanceError')]
    public $name, $desc;

    public $id, $imageFile;




    // :: helpers
    public $imageFileName;



    // :: relations
    public $diets = [], $plans = [];



} // end form

