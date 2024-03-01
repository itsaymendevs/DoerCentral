<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Form;

class MealForm extends Form
{



    // :: variables
    public $id, $type, $name, $generalName, $servingPrice, $validity, $isVegetarian, $desc, $imageFile, $secondImageFile, $thirdImageFile, $fourthImageFile;

    public $cuisineId, $dietId;



    // :: relations
    public $tags = [];
    public $mealTypes = [];





    // :: helpers
    public $imageFileName, $secondImageFileName, $thirdImageFileName, $fourthImageFileName;

} // end form
