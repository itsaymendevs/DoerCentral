<?php

namespace App\Livewire\Dashboard\Inventory\Components;

use App\Livewire\Forms\ExcludeForm;
use App\Models\Exclude;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;

class InventoryManageExcludes extends Component
{

    use HelperTrait;



    // :: variables
    public ExcludeForm $instance;








    public function store()
    {



        // :: validate
        $this->instance->validate();



        // 1: makeRequest
        $response = $this->makeRequest('dashboard/inventory/configurations/excludes/store', $this->instance);




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
        $excludes = Exclude::all();



        return view('livewire.dashboard.inventory.components.inventory-manage-excludes', compact('excludes'));


    } // end function



} // end class
