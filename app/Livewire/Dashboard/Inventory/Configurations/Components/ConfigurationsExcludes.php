<?php

namespace App\Livewire\Dashboard\Inventory\Configurations\Components;

use App\Livewire\Forms\ExcludeForm;
use App\Models\Exclude;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;

class ConfigurationsExcludes extends Component
{


    use HelperTrait;



    // :: variables
    public ExcludeForm $instance;








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



        return view('livewire.dashboard.inventory.configurations.components.configurations-excludes', compact('excludes'));


    } // end function



} // end class
