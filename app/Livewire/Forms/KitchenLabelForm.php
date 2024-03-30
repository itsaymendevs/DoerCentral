<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Form;

class KitchenLabelForm extends Form
{

    // :: variables
    #[Rule('required', as: 'instanceError')]
    public $name, $width, $height, $radius, $backgroundColor, $fontColor, $labelBackgroundColor, $imageFile;



    public $showQRCode, $showPrice, $showAllergy, $showMealRemarks, $showCustomerName, $showProductionDate, $showServingInstructions, $desc;




    // :: helper
    public $imageFileName;





} // end form
