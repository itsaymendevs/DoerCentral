<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class StockPurchaseIngredientForm extends Form
{

   // :: variables
   #[Validate('required')]
   public $quantity, $ingredientId, $stockPurchaseId;


   public $id, $buyPrice, $unitId;



   // :: helpers
   public $unitName;




} // end form
