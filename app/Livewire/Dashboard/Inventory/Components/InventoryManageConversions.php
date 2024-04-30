<?php

namespace App\Livewire\Dashboard\Inventory\Components;

use App\Livewire\Forms\ConversionForm;
use App\Models\Conversion;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;

class InventoryManageConversions extends Component
{


    use HelperTrait;



    // :: variables
    public ConversionForm $instance;








    public function store()
    {



        // :: validate
        $this->instance->validate();



        // 1: makeRequest
        $response = $this->makeRequest('dashboard/inventory/settings/conversions/store', $this->instance);




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



        return view('livewire.dashboard.inventory.components.inventory-manage-conversions', compact('conversions'));


    } // end function



} // end class


