<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Form;

class DriverForm extends Form
{
    // :: variables
    public $id, $name, $phone, $email, $license, $password, $imageFile, $licenseFile, $shiftTypeId;



    // :: helper
    public $imageFileName, $licenseFileName;


    // :: relations
    public $zones = [];

} // end form
