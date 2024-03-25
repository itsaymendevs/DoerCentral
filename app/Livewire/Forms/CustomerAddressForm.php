<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Form;

class CustomerAddressForm extends Form
{



    // :: variables
    #[Rule('required', as: 'instanceError')]
    public $name, $cityId, $cityDistrictId, $deliveryTimeId, $locationAddress, $customerId;


    public $id, $apartment, $floor;

    public $deliveryDays = [];


} // end form
