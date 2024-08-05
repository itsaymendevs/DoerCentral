<?php

namespace App\Livewire\Dashboard\Extra\WebApps\Settings\Components;

use Livewire\Component;

class SettingsPlanForm extends Component
{
    public function render()
    {



        // 1: dependencies
        $alignments = ['left', 'center', 'right'];





        // :: initTooltips
        $this->dispatch('initTooltips');



        return view('livewire.dashboard.extra.web-apps.settings.components.settings-plan-form', compact('alignments'));



    } // end function





} // end class
