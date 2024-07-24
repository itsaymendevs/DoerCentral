<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class PlanForm extends Form
{



    // :: variables
    #[Validate('required')]
    public $name, $startingPrice, $desc, $longDesc;

    public $id, $nameURL, $sectionTitle, $caption, $videoURL, $colorPaletteId, $imageFile, $secondImageFile, $thirdImageFile, $fourthImageFile, $fifthImageFile, $sixthImageFile;




    // :: helpers
    public $imageFileName, $secondImageFileName, $thirdImageFileName, $fourthImageFileName, $fifthImageFileName, $sixthImageFileName;




    // :: relation
    public $points = [];


} // end form
