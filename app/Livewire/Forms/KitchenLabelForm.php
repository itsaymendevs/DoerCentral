<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class KitchenLabelForm extends Form
{

   // :: variables
   #[Validate('required')]
   public $name, $charge, $width, $height, $backgroundColor, $fontColor, $labelBackgroundColor, $imageFile;



   public $id, $desc, $radius, $showQRCode, $showPrice, $showAllergy, $showMealRemarks, $showCustomerName, $showProductionDate, $showServingInstructions;




   // :: helper
   public $imageFileName;



   // relations
   public $containers = [];

} // end form
