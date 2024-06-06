<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class VehiclePromotionForm extends Form
{

    #[Validate('required')]
    public $promotionURL, $width, $height, $vehicleId;



    public $id;



} // end form
