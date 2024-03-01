<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Form;

class PromoCodeForm extends Form
{

    // :: variables
    #[Rule('required', as: 'instanceError')]
    public $name, $code, $limit;


    public $id, $percentage, $cashAmount, $isActive, $isForWebsite;



} // end form
