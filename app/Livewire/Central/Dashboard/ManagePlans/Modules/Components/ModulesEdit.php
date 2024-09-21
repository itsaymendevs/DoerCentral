<?php

namespace App\Livewire\Central\Dashboard\ManagePlans\Modules\Components;

use App\Livewire\Forms\FeatureModuleForm;
use App\Models\FeatureModule;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;

class ModulesEdit extends Component
{


    use HelperTrait;


    // :: variables
    public FeatureModuleForm $instance;







    #[On('editModule')]
    public function remount($id)
    {



        // 1: get instance
        $module = FeatureModule::find($id);

        foreach ($module->toArray() as $key => $value)
            $this->instance->{$key} = $value;





    } // end function








    // -----------------------------------------------------------







    public function update()
    {



        // 1: validation
        $this->instance?->validate();







        // 2: get instance
        $module = FeatureModule::find($this->instance->id);
        $module->name = $this->instance->name;
        $module->desc = $this->instance->desc ?? null;

        $module->save();




        // 2.1: refresh - alert
        $this->instance?->reset();

        $this->makeAlert('success', 'Module has been updated');
        $this->dispatch('refreshViews');
        $this->dispatch('closeModal', modal: '#edit-module .btn--close');



    } // end function












    // -----------------------------------------------------------







    public function render()
    {

        return view('livewire.central.dashboard.manage-plans.modules.components.modules-edit');

    } // end function




} // end class
