<?php

namespace App\Livewire\Dashboard\Inventory\Configurations\Components;

use App\Livewire\Forms\IngredientGroupForm;
use App\Models\IngredientGroup;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;

class ConfigurationsGroups extends Component
{



    use HelperTrait;



    // :: variables
    public IngredientGroupForm $instance;








    public function store()
    {



        // :: rolePermission
        if (! session('globalUser')->checkPermission('Add Actions')) {

            $this->makeAlert('info', 'Adding is not allowed for this account');

            return false;

        } // end if





        // --------------------------------------
        // --------------------------------------





        // :: validate
        $this->instance->validate();



        // 1: makeRequest
        $response = $this->makeRequest('dashboard/inventory/configurations/groups/store', $this->instance);




        // :: refresh / closeModal
        $this->instance->reset();
        $this->dispatch('initTooltips');
        $this->render();



        // :: alert
        $this->makeAlert('success', $response?->message);



    } // end function










    // -------------------------------------------------------







    #[On('refreshViews')]
    public function render()
    {


        // 1: dependencies
        $groups = IngredientGroup::all();



        return view('livewire.dashboard.inventory.configurations.components.configurations-groups', compact('groups'));


    } // end function



} // end class
