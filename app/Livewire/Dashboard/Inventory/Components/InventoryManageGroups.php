<?php

namespace App\Livewire\Dashboard\Inventory\Components;

use App\Livewire\Forms\IngredientGroupForm;
use App\Models\IngredientGroup;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;

class InventoryManageGroups extends Component
{


    use HelperTrait;



    // :: variables
    public IngredientGroupForm $instance;








    public function store()
    {



        // :: validate
        $this->instance->validate();



        // 1: makeRequest
        $response = $this->makeRequest('dashboard/inventory/configurations/groups/store', $this->instance);




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
        $groups = IngredientGroup::all();



        return view('livewire.dashboard.inventory.components.inventory-manage-groups', compact('groups'));


    } // end function



} // end class

