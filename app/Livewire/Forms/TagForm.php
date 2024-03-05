<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Form;

class TagForm extends Form
{

    // :: variables
    #[Rule('required', as: 'instanceError')]
    public $name, $imageFile;

    public $id;


    // :: helpers
    public $imageFileName;




} // end form
