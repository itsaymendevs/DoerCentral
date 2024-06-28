<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class VendorItemForm extends Form
{

    // :: variables
    #[Validate('required')]
    public $vendorId, $itemId, $sellPrice;

    public $id, $type, $unitId, $itemName;



    // :: helpers
    public $unitName;


} // end form
