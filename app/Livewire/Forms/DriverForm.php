<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class DriverForm extends Form
{
    // :: variables
    public $id, $name, $phone, $email, $license, $plate, $password, $imageFile, $licenseFile, $licenseRearFile, $plateFile, $ownershipFile, $shiftTypeId;



    // :: helper
    public $imageFileName, $licenseFileName, $licenseRearFileName, $plateFileName, $ownershipFileName;


    // :: relations
    public $zones = [];



} // end form
