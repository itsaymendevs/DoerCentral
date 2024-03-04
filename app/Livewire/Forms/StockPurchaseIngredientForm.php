<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Form;

class StockPurchaseIngredientForm extends Form
{

    // :: variables
    #[Rule('required', as: 'instanceError')]
    public $quantity, $ingredientId, $stockPurchaseId;


    public $id, $buyPrice, $unitId;



    // :: helpers
    public $unitName;




} // end form
