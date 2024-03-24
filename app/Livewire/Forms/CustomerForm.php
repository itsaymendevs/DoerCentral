<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Form;

class CustomerForm extends Form
{


    // :: general
    public $id, $phone, $email, $name, $height, $weight, $whatsapp, $gender, $newPassword, $birthDate, $isVIP, $isActive, $isEnabled, $bagRemarks;



    public $allergyLists = [], $excludeLists = [];
    public $managerId, $driverId;














} // end form
