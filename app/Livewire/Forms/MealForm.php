<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Form;

class MealForm extends Form
{



    // :: variables
    public $type, $name, $generalName, $servingPrice, $validity, $isVegetarian, $desc, $imageFile, $secondImageFile, $thirdImageFile, $fourthImageFile;

    public $cuisineId, $dietId;



    // :: relations
    public $tags = [];




    // :: helpers
    public $imageFileName, $secondImageFileName, $thirdImageFileName, $fourthImageFileName;

} // end form
