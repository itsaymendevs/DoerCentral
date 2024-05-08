<?php

namespace App\Livewire\Dashboard\Inventory\Components;

use App\Livewire\Forms\AllergyForm;
use App\Models\Allergy;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;

class InventoryManageAllergies extends Component
{
    use HelperTrait;



    // :: variables
    public AllergyForm $instance;








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
        $response = $this->makeRequest('dashboard/inventory/configurations/allergies/store', $this->instance);




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
        $allergies = Allergy::all();



        return view('livewire.dashboard.inventory.components.inventory-manage-allergies', compact('allergies'));


    } // end function



} // end class

