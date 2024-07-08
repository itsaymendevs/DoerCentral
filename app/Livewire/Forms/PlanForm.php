<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class PlanForm extends Form
{



    // :: variables
    #[Validate('required')]
    public $name, $startingPrice, $desc, $longDesc;

    public $id, $nameURL, $colorPaletteId, $imageFile, $secondImageFile, $thirdImageFile;




    // :: helpers
    public $imageFileName, $secondImageFileName, $thirdImageFileName;


} // end form
