<?php

namespace App\Livewire\Central\Dashboard\Inventory\Settings\Components;

use App\Livewire\Forms\ConversionForm;
use App\Models\Conversion;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;

class SettingsConversions extends Component
{



    use HelperTrait;



    // :: variables
    public ConversionForm $instance;








    public function store()
    {


        // :: validate
        $this->instance->validate();



        // 1: makeRequest
        $response = $this->makeRequest('central/dashboard/inventory/settings/conversions/store', $this->instance);




        // :: refresh / closeModal
        $this->instance->reset();
        $this->dispatch('refreshViews');
        $this->dispatch('initTooltips');



        // :: alert
        $this->makeAlert('success', $response?->message);



    } // end function










    // -------------------------------------------------------







    #[On('refreshViews')]
    public function render()
    {


        // 1: dependencies
        $conversions = Conversion::all();



        return view('livewire.central.dashboard.inventory.settings.components.settings-conversions', compact('conversions'));


    } // end function



} // end class
