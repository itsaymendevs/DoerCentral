<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Form;

class KitchenLabelForm extends Form
{

    // :: variables
    #[Rule('required', as: 'instanceError')]
    public $name, $charge, $width, $height, $backgroundColor, $fontColor, $labelBackgroundColor, $imageFile;



    public $id, $desc, $radius, $showQRCode, $showPrice, $showAllergy, $showMealRemarks, $showCustomerName, $showProductionDate, $showServingInstructions;




    // :: helper
    public $imageFileName;



    // relations
    public $containers = [];

} // end form
