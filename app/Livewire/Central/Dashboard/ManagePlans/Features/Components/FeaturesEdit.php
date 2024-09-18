<?php

namespace App\Livewire\Central\Dashboard\ManagePlans\Features\Components;

use App\Livewire\Forms\FeatureForm;
use App\Models\Feature;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;

class FeaturesEdit extends Component
{


    use HelperTrait;


    // :: variables
    public FeatureForm $instance;







    #[On('editFeature')]
    public function remount($id)
    {



        // 1: get instance
        $feature = Feature::find($id);

        foreach ($feature->toArray() as $key => $value)
            $this->instance->{$key} = $value;



        // 1.2: featureModule
        $this->instance->featureModuleName = $feature?->module?->name ?? null;




    } // end function








    // -----------------------------------------------------------







    public function update()
    {



        // 1: validation
        $this->instance?->validate();







        // 2: get instance
        $feature = Feature::find($this->instance->id);
        $feature->name = $this->instance->name;

        $feature->save();




        // 2.1: refresh - alert
        $this->instance?->reset();

        $this->makeAlert('success', 'Feature has been updated');
        $this->dispatch('refreshViews');
        $this->dispatch('closeModal', modal: '#edit-feature .btn--close');



    } // end function












    // -----------------------------------------------------------







    public function render()
    {

        return view('livewire.central.dashboard.manage-plans.features.components.features-edit');

    } // end function




} // end class
