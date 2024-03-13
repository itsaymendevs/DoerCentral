<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Form;

class PlanBundleRangePriceForm extends Form
{

    // :: variables
    #[Rule('required', as: 'instanceError')]
    public $id, $pricePerDay;


    public $planRangeId, $planBundleId;



} // end form
