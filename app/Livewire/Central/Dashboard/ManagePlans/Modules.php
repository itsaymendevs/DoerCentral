<?php

namespace App\Livewire\Central\Dashboard\ManagePlans;

use App\Models\FeatureModule;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;

class Modules extends Component
{


    use HelperTrait;


    // :: variables
    public $searchModule = '';







    public function edit($id)
    {


        // 1: dispatchEvent
        $this->dispatch('editModule', $id);



    } // end function










    // -----------------------------------------------------------









    #[On('refreshViews')]
    public function render()
    {


        // 1: dependencies
        $modules = FeatureModule::where('name', 'LIKE', '%' . $this->searchModule . '%')?->get();





        // :: initTooltips
        $this->dispatch('initTooltips');


        return view('livewire.central.dashboard.manage-plans.modules', compact('modules'));



    } // end function




} // end class




