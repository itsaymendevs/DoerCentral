<?php

namespace App\Livewire\Loaders;

use Livewire\Component;

class RegularLoader extends Component
{
    public function render()
    {
        return view('livewire.loaders.regular-loader');
    }
}
