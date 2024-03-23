<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Form;

class CustomerWalletDepositForm extends Form
{



    // :: variables
    #[Rule('required', as: 'instanceError')]
    public $customerId, $walletId, $amount, $remarks, $depositDate;




} // end form
