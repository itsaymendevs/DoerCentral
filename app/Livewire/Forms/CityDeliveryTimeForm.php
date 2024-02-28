<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Form;


class CityDeliveryTimeForm extends Form
{

    // :: variables
    #[Rule('required', as: 'instanceError')]
    public $cityId, $title, $deliveryFrom, $deliveryUntil;


    public $id, $isActive;



} // end form
