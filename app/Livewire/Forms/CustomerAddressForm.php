<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Form;

class CustomerAddressForm extends Form
{



    // :: variables
    #[Rule('required', as: 'instanceError')]
    public $id, $name, $cityId, $cityDistrictId, $deliveryTimeId, $locationAddress;


    public $apartment, $floor;

    public $deliveryDays = [];


} // end form
