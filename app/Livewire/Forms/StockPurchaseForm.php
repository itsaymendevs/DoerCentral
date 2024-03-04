<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Form;

class StockPurchaseForm extends Form
{


    // :: variables
    #[Rule('required', as: 'instanceError')]
    public $purchaseID, $receivingDate, $supplierId;

    public $id, $PONumber, $remarks, $isConfirmed;


    // :: helpers
    public $supplierName;



} // end form
