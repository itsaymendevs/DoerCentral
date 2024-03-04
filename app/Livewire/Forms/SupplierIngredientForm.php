<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Form;

class SupplierIngredientForm extends Form
{

    // :: variables
    #[Rule('required', as: 'instanceError')]
    public $supplierId, $ingredientId, $sellPrice, $unitId;

    public $id;



    // :: helpers
    public $unitName;


} // end form
